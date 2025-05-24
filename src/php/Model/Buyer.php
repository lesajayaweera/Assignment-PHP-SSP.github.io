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
            $query = "SELECT firstName, lastName, email, image_path FROM 
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
}


