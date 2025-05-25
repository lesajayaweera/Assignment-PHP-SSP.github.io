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
            ORDER BY 
                c.status= 'pending'
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
                'cart' => [
                    'id' => $row['id'],
                    'buyerID' => $row['buyerID'],
                    'vehicleID' => $row['vehicleID'],
                    'status' => $row['status']
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
}


