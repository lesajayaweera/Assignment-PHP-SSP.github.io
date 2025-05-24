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
}


