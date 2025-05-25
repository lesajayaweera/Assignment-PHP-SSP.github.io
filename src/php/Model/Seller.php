<?php
require_once("./src/php/Model/Database.php");
require_once("./src/php/Model/Validator.php");

class Seller{
    private $fname;
    private $lname;
    private $description;
    private $image;
    private $password;
    private $email;
    private $conn;

    public function __construct($fname="",$lname="",$email="",$password="",$description="",$image="")
    {
        $db = new Database();
        $this->conn = $db->getConnection();
        $this->fname =$fname;
        $this->lname =$lname;
        $this->email =$email;
        $this->password =$password;
        $this->description =$description;
        $this->image =$image;
    }

    public function Upload_seller_details($fname, $lname, $email, $password) {
        if (Validator::ValidateCredentials($fname, $lname, $email, $password)) {
            $this->conn->begin_transaction();
            try {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Handle image upload
                $imagePath = null;
                if (!empty($this->image['name'])) {
                    $uploadDir = "/Assignment/uploads/";
                    $imageName = time() . '_' . basename($this->image['name']); // Add timestamp for uniqueness
                    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $uploadDir . $imageName;
                    $relativePath = $uploadDir . $imageName;

                    // Check if upload directory exists, create if not
                    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $uploadDir)) {
                        mkdir($_SERVER['DOCUMENT_ROOT'] . $uploadDir, 0755, true);
                    }

                    // Validate image file
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    $fileType = mime_content_type($this->image['tmp_name']);
                    
                    if (!in_array($fileType, $allowedTypes)) {
                        throw new Exception("Only JPG, PNG, and GIF images are allowed.");
                    }

                    if (move_uploaded_file($this->image['tmp_name'], $targetPath)) {
                        $imagePath = $relativePath;
                    } else {
                        throw new Exception("Failed to upload image.");
                    }
                }

                // Update user details (including image path if uploaded)
                $updateUser = $this->conn->prepare("UPDATE users SET firstName=?, lastName=?, password=?, image_path=? WHERE email=?");
                $updateUser->bind_param("sssss", $fname, $lname, $hashed_password, $imagePath, $email);
                $updateUser->execute();

                if ($updateUser->affected_rows < 0) {
                    throw new Exception("Failed to update user details.");
                }

                // Get user ID
                $getUserID = $this->conn->prepare("SELECT id FROM users WHERE email=?");
                $getUserID->bind_param("s", $email);
                $getUserID->execute();
                $result = $getUserID->get_result();
                
                if ($result->num_rows === 0) {
                    throw new Exception("User not found.");
                }
                
                $user = $result->fetch_assoc();
                $userID = $user['id'];

                // Check if seller exists
                $checkSeller = $this->conn->prepare("SELECT id FROM seller WHERE userID=?");
                $checkSeller->bind_param("i", $userID);
                $checkSeller->execute();
                $checkResult = $checkSeller->get_result();

                if ($checkResult->num_rows > 0) {
                    // Update existing seller description
                    $updateSeller = $this->conn->prepare("UPDATE seller SET Description=? WHERE userID=?");
                    $updateSeller->bind_param("si", $this->description, $userID);
                    $updateSeller->execute();

                    if ($updateSeller->affected_rows < 0) {
                        throw new Exception("Failed to update seller description.");
                    }
                } else {
                    // Insert new seller record
                    $insertSeller = $this->conn->prepare("INSERT INTO seller (userID, Description) VALUES (?, ?)");
                    $insertSeller->bind_param("is", $userID, $this->description);
                    $insertSeller->execute();

                    if ($insertSeller->affected_rows <= 0) {
                        throw new Exception("Failed to create seller record.");
                    }
                }

                // Commit transaction if all operations succeeded
                $this->conn->commit();
                return true;

            } catch (Exception $e) {
                // Rollback transaction on error
                $this->conn->rollback();
                error_log("Transaction failed: " . $e->getMessage());
                // Consider returning the error message for display
                return $e->getMessage();
            }
        } else {
            return "Invalid input data.";
        }
    }

    // to get the seller details
    public function getSellerDetails($email) {
        try {
            $query = "
                SELECT 
                    u.firstName, 
                    u.lastName, 
                    u.email, 
                    u.image_path,
                    s.Description
                FROM 
                    users u
                INNER JOIN 
                    seller s ON u.id = s.userID
                WHERE 
                    u.email = ?
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

    // to get the seller listed vehicles
        /**
     * Fetches all vehicles with their main images for a specific seller
     * 
     * @param mysqli $connection MySQLi database connection
     * @param int $sellerId The ID of the seller
     * @return array Array of vehicles with their main images
     * @throws Exception If query fails
     */
    function getVehiclesWithMainImagesBySeller( $sellerId) {
        // Validate input
        if (!is_numeric($sellerId)) {
            throw new InvalidArgumentException("Seller ID must be numeric");
        }

        // Prepare the query
        $query = "
            SELECT 
                v.*,
                vi.image_path AS main_image
            FROM 
                vehicles v
            LEFT JOIN 
                vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1
            WHERE 
                v.sellerID = ?
            ORDER BY 
                v.CreatedAt DESC
        ";

        // Prepare and execute the statement
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch all results as associative array
        $vehicles = [];
        while ($row = $result->fetch_assoc()) {
            $vehicles[] = $row;
        }

        $stmt->close();
        return $vehicles;
    }
    function getOtherAvailableVehiclesFromSameSeller($vehicleId) {
        // Validate input
        if (!is_numeric($vehicleId)) {
            throw new InvalidArgumentException("Vehicle ID must be numeric");
        }

        // Prepare the query
        $query = "
            SELECT 
                v.*,
                vi.image_path AS main_image
            FROM 
                vehicles v
            LEFT JOIN 
                vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1
            WHERE 
                v.sellerID = (SELECT sellerID FROM vehicles WHERE VehicleID = ?)
                AND v.VehicleID != ?
                AND v.VehicleID NOT IN (SELECT vehicleID FROM orders)
            ORDER BY 
                v.CreatedAt DESC
        ";

        // Prepare and execute the statement
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("ii", $vehicleId, $vehicleId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch all results as associative array
        $vehicles = [];
        while ($row = $result->fetch_assoc()) {
            $vehicles[] = $row;
        }

        $stmt->close();
        return $vehicles;
    }


    // get the negotiation details
    public function getAllNegotiationsWithDetails() {
        $query = "
            SELECT 
                n.*,
                v.*,
                u.id as buyer_id,
                u.firstName as buyer_firstName,
                u.lastName as buyer_lastName,
                u.email as buyer_email,
                u.image_path as buyer_image,
                vi.image_path as vehicle_main_image
            FROM 
                negotiations n
            JOIN 
                vehicles v ON n.vehicleID = v.VehicleID
            JOIN 
                users u ON n.buyerID = u.id
            LEFT JOIN 
                vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1
            WHERE 
                n.status = 'pending'
            ORDER BY 
                n.id DESC
        ";

        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->conn->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $negotiations = [];
        while ($row = $result->fetch_assoc()) {
            $negotiations[] = [
                'negotiation' => [
                    'id' => $row['id'],
                    'vehicleID' => $row['vehicleID'],
                    'buyerID' => $row['buyerID'],
                    'negotiatedPrice' => $row['negotiatedPrice'],
                    'status' => $row['status'],
                    // Include timestamps if you added them
                    // 'createdAt' => $row['createdAt'],
                    // 'updatedAt' => $row['updatedAt']
                ],
                'vehicle' => [
                    'VehicleID' => $row['VehicleID'],
                    'sellerID' => $row['sellerID'],
                    'Make' => $row['Make'],
                    'Model' => $row['Model'],
                    'Year' => $row['Year'],
                    'FuelType' => $row['FuelType'],
                    'cateogory' => $row['cateogory'],
                    'Transmission' => $row['Transmission'],
                    'Engine' => $row['Engine'],
                    'Seats' => $row['Seats'],
                    'condition' => $row['veh_condition'],
                    'width' => $row['width'],
                    'length' => $row['length'],
                    'height' => $row['height'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'CreatedAt' => $row['CreatedAt'],
                    'main_image' => $row['vehicle_main_image']
                ],
                'buyer' => [
                    'id' => $row['buyer_id'],
                    'firstName' => $row['buyer_firstName'],
                    'lastName' => $row['buyer_lastName'],
                    'email' => $row['buyer_email'],
                    'buyer_image'=>$row['buyer_image']

                ]
            ];
        }

        $stmt->close();
        return $negotiations;
    }



    /**
 * Handles negotiation response (accept/reject) and performs all related updates

 */
    public function handleNegotiationResponse($negotiationID, $accept) {
    // Begin transaction to ensure data consistency
    $this->conn->begin_transaction();
    
    try {
        // 1. First get the negotiation details
        $negotiation = $this->getNegotiationDetails($negotiationID);
        if (!$negotiation) {
            throw new Exception("Negotiation not found");
        }
        
        if ($accept) {
            // 2. Check if vehicle already has an order
            if ($this->vehicleHasOrder($negotiation['vehicleID'])) {
                // Update existing order price and vehicle price
                $this->updateOrderPrice(
                    $negotiation['vehicleID'],
                    $negotiation['negotiatedPrice']
                );
                
                $this->updateVehiclePrice(
                    $negotiation['vehicleID'],
                    $negotiation['negotiatedPrice']
                );
                
                // Update negotiation status to approved
                $this->updateNegotiationStatus($negotiationID, 'approved');
            } else {
                // 3. If no existing order, proceed with normal flow
                $this->updateNegotiationStatus($negotiationID, 'approved');
                
                // 4. Create order record
                $this->createOrder(
                    $negotiation['vehicleID'],
                    $negotiation['buyerID'],
                    $negotiation['sellerID'],
                    $negotiation['negotiatedPrice']
                );
                
                // 5. Update vehicle price
                $this->updateVehiclePrice(
                    $negotiation['vehicleID'],
                    $negotiation['negotiatedPrice']
                );
            }
        } else {
            // 2. If rejecting, delete the negotiation
            $this->deleteNegotiation($negotiationID);
        }
        
        // Commit all changes if everything succeeded
        $this->conn->commit();
        return true;
        
    } catch (Exception $e) {
        // Rollback on any error
        $this->conn->rollback();
        error_log("Negotiation handling failed: " . $e->getMessage());
        return false;
    }
}

// New helper function to check if vehicle has an existing order
function vehicleHasOrder($vehicleID) {
    $stmt = $this->conn->prepare("
        SELECT COUNT(*) as order_count 
        FROM orders 
        WHERE vehicleID = ? AND status != 'cancelled'
    ");
    $stmt->bind_param("i", $vehicleID);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['order_count'] > 0;
}

// New helper function to update existing order price
function updateOrderPrice($vehicleID, $newPrice) {
    $stmt = $this->conn->prepare("
        UPDATE orders 
        SET price = ? 
        WHERE vehicleID = ? AND status != 'cancelled'
    ");
    $stmt->bind_param("di", $newPrice, $vehicleID);
    return $stmt->execute();
}

    // Helper function to get negotiation details
    function getNegotiationDetails($negotiationID) {
        $stmt = $this->conn->prepare("
            SELECT n.*, v.sellerID 
            FROM negotiations n
            JOIN vehicles v ON n.vehicleID = v.VehicleID
            WHERE n.id = ?
        ");
        $stmt->bind_param("i", $negotiationID);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Helper function to update negotiation status
    function updateNegotiationStatus($negotiationID, $status) {
        $stmt = $this->conn->prepare("
            UPDATE negotiations SET status = ? WHERE id = ?
        ");
        $stmt->bind_param("si", $status, $negotiationID);
        return $stmt->execute();
    }

    // Helper function to create order
    function createOrder($vehicleID, $buyerID, $sellerID, $price) {
        $stmt = $this->conn->prepare("
            INSERT INTO orders 
            (vehicleID, buyerID, sellerID, price, status) 
            VALUES (?, ?, ?, ?, 'pending')
        ");
        $stmt->bind_param("iiii", $vehicleID, $buyerID, $sellerID, $price);
        return $stmt->execute();
    }

    // Helper function to update vehicle price
    function updateVehiclePrice($vehicleID, $newPrice) {
        $stmt = $this->conn->prepare("
            UPDATE vehicles SET price = ? WHERE VehicleID = ?
        ");
        $stmt->bind_param("di", $newPrice, $vehicleID);
        return $stmt->execute();
    }

    // Helper function to delete negotiation
    function deleteNegotiation($negotiationID) {
        $stmt = $this->conn->prepare("
            DELETE FROM negotiations WHERE id = ?
        ");
        $stmt->bind_param("i", $negotiationID);
        return $stmt->execute();
    }


}