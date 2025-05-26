<?php
require_once("./src/php/Model/Database.php");
require_once("./src/php/Model/User.php");

class Buyer {
    private $conn;
    public function __construct()
    {
        $db= new Database();
        $this->conn =$db->getConnection();   
    }

    public function EditUser($fname,$lname,$email,$password,$image){
        $result =User::EditUser($this->conn,$fname,$lname,$email,$password,$image);
        if($result){
            echo "<script>alert('User edited sucessfully')</script>";
        }
        else{
            echo "<script>alert('User edited unsucessful')</script>";
        }
    }
    public function GetUserDetails($email) {
        try {
            $query = "SELECT  id, firstName, lastName, email, image_path FROM 
                    users 
                WHERE 
                    email = ?
            ";

            $stmt = $this->conn->prepare($query);
            
            // Check if prepare() failed
            if ($stmt === false) {
                throw new Exception("SQL prepare failed: " . $this->conn->error);
            }

            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                return $result->fetch_assoc();
            } else {
                return null;
            }

        } catch (Exception $e) {
            error_log("Failed to fetch seller details: " . $e->getMessage());
            return false;
        }
    }

    function insertNegotiation($vehicleID, $buyerID, $negotiatedPrice, $status = 'pending') {
        // Validate inputs
        if (!is_numeric($vehicleID) || $vehicleID <= 0 ||
            !is_numeric($buyerID) || $buyerID <= 0 ||
            !is_numeric($negotiatedPrice) || $negotiatedPrice <= 0) {
            return false;
        }
        
        $allowedStatuses = ['pending', 'approved', 'disapproved'];
        if (!in_array($status, $allowedStatuses)) {
            return false;
        }

        try {
            // Check for existing negotiation for this vehicle
            $checkQuery = "SELECT id FROM negotiations WHERE vehicleID = ?";
            $checkStmt = $this->conn->prepare($checkQuery);
            $checkStmt->bind_param("i", $vehicleID);
            $checkStmt->execute();
            
            if ($checkStmt->get_result()->num_rows > 0) {
                $checkStmt->close();
                return false;
            }
            $checkStmt->close();

            // Prepare and execute insert
            $query = "INSERT INTO negotiations 
                    (vehicleID, buyerID, negotiatedPrice, status) 
                    VALUES (?, ?, ?, ?)";
            
            $stmt = $this->conn->prepare($query);
            if (!$stmt) {
                return false;
            }

            $stmt->bind_param("iids", $vehicleID, $buyerID, $negotiatedPrice, $status);
            $result = $stmt->execute();
            $stmt->close();
            
            return $result;
            
        } catch (Exception $e) {
            return false;
        }
    }

    public function getBuyerCartWithDetails($buyerID) {
        // Validate input
        if (!is_numeric($buyerID)) {
            throw new InvalidArgumentException("Buyer ID must be numeric");
        }

        $query = "
            SELECT 
                c.*,
                v.VehicleID,
                v.Make,
                v.Model,
                v.Year,
                v.price AS vehicle_price,
                v.description,
                vi.image_path AS vehicle_image,
                u.id AS seller_id,
                u.firstName AS seller_firstName,
                u.lastName AS seller_lastName,
                u.email AS seller_email,
                u.image_path AS seller_image
            FROM 
                orders c
            JOIN 
                vehicles v ON c.vehicleID = v.VehicleID
            JOIN 
                users u ON v.sellerID = u.id
            LEFT JOIN 
                vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1
            WHERE 
                c.buyerID = ?
                AND c.status = 'pending'
            ORDER BY 
                c.id DESC
        ";

        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("i", $buyerID);
        $stmt->execute();
        $result = $stmt->get_result();

        $cartItems = [];
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = [
                'order' => [
                    'id' => $row['id'],
                    'buyerID' => $row['buyerID'],
                    'vehicleID' => $row['vehicleID'],
                    'status' => $row['status'],
                    'price' => $row['price']
                ],
                'vehicle' => [
                    'VehicleID' => $row['VehicleID'],
                    'Make' => $row['Make'],
                    'Model' => $row['Model'],
                    'Year' => $row['Year'],
                    'price' => $row['vehicle_price'],
                    'description' => $row['description'],
                    'image' => $row['vehicle_image']
                ],
                'seller' => [
                    'id' => $row['seller_id'],
                    'firstName' => $row['seller_firstName'],
                    'lastName' => $row['seller_lastName'],
                    'email' => $row['seller_email'],
                    'image' => $row['seller_image']
                ]
            ];
        }

        $stmt->close();
        return $cartItems;
    }
    public function removeFromCart($cartID) {
        // Validate input
        if (!is_numeric($cartID) || $cartID <= 0) {
            throw new InvalidArgumentException("Invalid Cart ID");
        }

        // Prepare the delete statement
        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->conn->error);
        }

        // Bind parameters and execute
        $stmt->bind_param("i", $cartID);
        $success = $stmt->execute();
        
        // Check if any row was actually deleted
        $rowsAffected = $stmt->affected_rows;
        $stmt->close();
        
        return ($success && $rowsAffected > 0);
    }

    // function to let the user add a car to the cart
    public function createOrder($vehicleID, $buyerID) {
        // Validate inputs
        if (!is_numeric($vehicleID) || $vehicleID <= 0) {
            throw new InvalidArgumentException("Invalid Vehicle ID");
        }
        
        if (!is_numeric($buyerID) || $buyerID <= 0) {
            throw new InvalidArgumentException("Invalid Buyer ID");
        }

        // Begin transaction
        $this->conn->begin_transaction();
        
        try {
            // 1. Get vehicle details including sellerID and price
            $vehicle = $this->getVehicleDetails($vehicleID);
            if (!$vehicle) {
                throw new Exception("Vehicle not found");
            }

            // 2. Check if vehicle is already ordered
            if ($this->isVehicleOrdered($vehicleID)) {
                throw new Exception("Vehicle already has an existing order");
            }

            // 3. Insert into orders table
            $query = "
                INSERT INTO orders 
                (vehicleID, buyerID, sellerID, price, status) 
                VALUES (?, ?, ?, ?, 'pending')
            ";
            
            $stmt = $this->conn->prepare($query);
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }

            $stmt->bind_param(
                "iiid", 
                $vehicleID, 
                $buyerID, 
                $vehicle['sellerID'], 
                $vehicle['price']
            );
            
            $success = $stmt->execute();
            $orderID = $stmt->insert_id;
            $stmt->close();
            
            if (!$success) {
                throw new Exception("Order creation failed");
            }

            // 4. Optional: Mark vehicle as unavailable
            // $this->markVehicleAsSold($vehicleID);

            // Commit transaction
            $this->conn->commit();
            return $orderID;
            
        } catch (Exception $e) {
            // Rollback on error
            $this->conn->rollback();
            error_log("Order creation error: " . $e->getMessage());
            return false;
        }
    }

// Helper method to get vehicle details
    private function getVehicleDetails($vehicleID) {
        $stmt = $this->conn->prepare("
            SELECT sellerID, price 
            FROM vehicles 
            WHERE VehicleID = ?
        ");
        $stmt->bind_param("i", $vehicleID);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Helper method to check if vehicle already has an order
    private function isVehicleOrdered($vehicleID) {
        $stmt = $this->conn->prepare("
            SELECT id FROM orders WHERE vehicleID = ?
        ");
        $stmt->bind_param("i", $vehicleID);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }

    // function to get the total of the cart
    public function getCompleteCartSummary($buyerID) {
        
        if (!is_numeric($buyerID) || $buyerID <= 0) {
            throw new InvalidArgumentException("Invalid Buyer ID: Must be a positive integer");
        }

        $this->conn->begin_transaction();
        
        try {
            
            $summaryQuery = "
                SELECT 
                    COUNT(c.id) AS item_count,
                    SUM(v.price) AS subtotal,
                    SUM(v.price) * 0.1 AS tax,
                    SUM(v.price) * 1.1 AS total
                FROM orders c
                JOIN vehicles v ON c.vehicleID = v.VehicleID
                WHERE c.buyerID = ?
                AND c.status = 'pending'
            ";
            
            $stmt = $this->conn->prepare($summaryQuery);
            if ($stmt === false) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            
            $bindResult = $stmt->bind_param("i", $buyerID);
            if ($bindResult === false) {
                throw new Exception("Bind failed: " . $stmt->error);
            }
            
            $executeResult = $stmt->execute();
            if ($executeResult === false) {
                throw new Exception("Execute failed: " . $stmt->error);
            }
            
            $result = $stmt->get_result();
            if ($result === false) {
                throw new Exception("Get result failed: " . $stmt->error);
            }
            
            $summary = $result->fetch_assoc();
            $stmt->close();

            
            $itemsQuery = "
                SELECT 
                    c.id AS order_id,
                    c.price AS order_price,
                    c.status,
                    v.VehicleID,
                    v.Make,
                    v.Model,
                    v.Year,
                    v.price AS vehicle_price,
                    vi.image_path AS main_image
                FROM orders c
                JOIN vehicles v ON c.vehicleID = v.VehicleID
                LEFT JOIN vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1
                WHERE c.buyerID = ?
                AND c.status = 'pending'
                ORDER BY c.id DESC
            ";
            
            $stmt = $this->conn->prepare($itemsQuery);
            if ($stmt === false) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            
            $bindResult = $stmt->bind_param("i", $buyerID);
            if ($bindResult === false) {
                throw new Exception("Bind failed: " . $stmt->error);
            }
            
            $executeResult = $stmt->execute();
            if ($executeResult === false) {
                throw new Exception("Execute failed: " . $stmt->error);
            }
            
            $result = $stmt->get_result();
            $items = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            $this->conn->commit();
            
            return [
                'summary' => [
                    'item_count' => (int)($summary['item_count'] ?? 0),
                    'subtotal' => (float)($summary['subtotal'] ?? 0.00),
                    'tax' => (float)($summary['tax'] ?? 0.00),
                    'total' => (float)($summary['total'] ?? 0.00),
                    'currency' => 'USD'
                ],
                'items' => $items ?: []
            ];
            
        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Cart summary error for buyer {$buyerID}: " . $e->getMessage());
            throw new Exception("Could not retrieve cart summary: " . $e->getMessage());
        }
    }

    // method to insert the billing information of the user
 

    

    function insertOrUpdateBillingInfo( $buyerID, $address, $apartment, $city, $country, $zipcode) {
        
        

        $query = "INSERT INTO billing (buyerID, address, apartment, city, country, zipcode)
                VALUES ('$buyerID', '$address', '$apartment', '$city', '$country', '$zipcode')
                ON DUPLICATE KEY UPDATE
                address = VALUES(address),
                apartment = VALUES(apartment),
                city = VALUES(city),
                country = VALUES(country),
                zipcode = VALUES(zipcode)";
        
        if ($this->conn->query($query)) {
            return $this->conn->affected_rows > 0 
                ? "Billing information processed successfully" 
                : "No changes made to billing information";
        } else {
            return "Error processing billing information: " . $this->conn->error;
        }
    }
    // method to update the order table status to completed
    
 
    public function completeBuyerOrders($buyerID) {
       
        if (!is_numeric($buyerID) || $buyerID <= 0) {
            throw new InvalidArgumentException("Invalid Buyer ID: Must be a positive integer");
        }

        $query = "
            UPDATE orders 
            SET status = 'completed'
            WHERE buyerID = ? 
            AND status = 'pending'
        ";

        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error);
            return false;
        }

        $stmt->bind_param("i", $buyerID);
        
        if (!$stmt->execute()) {
            error_log("Update failed: " . $stmt->error);
            return false;
        }

        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        
        return $affectedRows;
    }

 
    public function addToFavorites($vehicleID, $buyerID) {
    
        if (!is_numeric($vehicleID) || $vehicleID <= 0) {
            return ['success' => false, 'message' => 'Invalid vehicle ID'];
        }
        
        if (!is_numeric($buyerID) || $buyerID <= 0) {
            return ['success' => false, 'message' => 'Invalid buyer ID'];
        }

        try {
      
            $checkStmt = $this->conn->prepare("SELECT id FROM favourites WHERE vehicleID = ? AND buyerID = ?");
            $checkStmt->bind_param("ii", $vehicleID, $buyerID);
            $checkStmt->execute();
            
            if ($checkStmt->get_result()->num_rows > 0) {
                return ['success' => false, 'message' => 'Vehicle already in favorites'];
            }


            $insertStmt = $this->conn->prepare("INSERT INTO favourites (vehicleID, buyerID) VALUES (?, ?)");
            $insertStmt->bind_param("ii", $vehicleID, $buyerID);
            
            if ($insertStmt->execute()) {
                return ['success' => true, 'message' => 'Added to favorites successfully'];
            } else {
                return ['success' => false, 'message' => 'Failed to add to favorites'];
            }
        } catch (Exception $e) {
            error_log("Error adding to favorites: " . $e->getMessage());
            return ['success' => false, 'message' => 'Database error'];
        }
    }
   
    public function moveFavoriteTocart($favoriteID) {
        $this->conn->begin_transaction();
        
        try {
       
            $getFavoriteStmt = $this->conn->prepare("
                SELECT f.vehicleID, f.buyerID, v.sellerID, v.price 
                FROM favourites f
                JOIN vehicles v ON f.vehicleID = v.VehicleID
                WHERE f.id = ?
            ");
            $getFavoriteStmt->bind_param("i", $favoriteID);
            $getFavoriteStmt->execute();
            $favoriteData = $getFavoriteStmt->get_result()->fetch_assoc();
            $getFavoriteStmt->close();
            
            if (!$favoriteData) {
                throw new Exception("Favorite item not found");
            }

       
            $addOrderStmt = $this->conn->prepare("
                INSERT INTO orders 
                (vehicleID, buyerID, sellerID, price, status) 
                VALUES (?, ?, ?, ?, 'pending')
            ");
            $addOrderStmt->bind_param(
                "iiii", 
                $favoriteData['vehicleID'],
                $favoriteData['buyerID'],
                $favoriteData['sellerID'],
                $favoriteData['price']
            );
            
            if (!$addOrderStmt->execute()) {
                throw new Exception("Failed to create order");
            }
            $addOrderStmt->close();

           
            $removeFavoriteStmt = $this->conn->prepare("
                DELETE FROM favourites WHERE id = ?
            ");
            $removeFavoriteStmt->bind_param("i", $favoriteID);
            
            if (!$removeFavoriteStmt->execute()) {
                throw new Exception("Failed to remove favorite");
            }
            $removeFavoriteStmt->close();

            $this->conn->commit();
            return [
                'success' => true,
                'message' => 'Item moved to orders successfully'
            ];

        } catch (Exception $e) {
            $this->conn->rollback();
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function removeFavorite($favoriteID) {
        try {
            
            $stmt = $this->conn->prepare("DELETE FROM favourites WHERE id = ?");
            $stmt->bind_param("i", $favoriteID);
            
          
            if ($stmt->execute()) {
             
                if ($stmt->affected_rows > 0) {
                    return [
                        'success' => true,
                        'message' => 'Item removed from favorites successfully'
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => 'No favorite item found with that ID'
                    ];
                }
            } else {
                throw new Exception("Database error during deletion");
            }
        } catch (Exception $e) {
            error_log("Error removing favorite: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to remove item from favorites'
            ];
        }
    }

}