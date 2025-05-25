<?php 
require_once("./src/php/Model/Database.php");
require_once("./src/php/Model/User.php");
class Admin {
    private $conn;

    public function __construct(){
        $db = new Database;
        $this->conn =$db->getConnection();
    }

    function getNonAdminUsers() {
        $users = array();
        
        // Prepare the statement
        $stmt = $this->conn->prepare("SELECT id, firstName, lastName, email, role, image_path 
                            FROM users 
                            WHERE role != ?");
        
        if ($stmt === false) {
            error_log("Prepare failed: " . $this->conn->error);
            return $users;
        }
        
        // Bind parameters - 'admin' is the value we want to exclude
        $adminRole = 'admin';
        $stmt->bind_param('s', $adminRole);
        
        // Execute the statement
        if (!$stmt->execute()) {
            error_log("Execute failed: " . $stmt->error);
            $stmt->close();
            return $users;
        }
        
        // Get result
        $result = $stmt->get_result();
        
        // Fetch all rows
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            
            // Close statement
            $stmt->close();
            
            return $users;
    }

    

    public function deleteNonAdminUsers($userId, $uploadDir = "./uploads/") {
        // Validate input
        if (!is_numeric($userId) || $userId <= 0) {
            throw new InvalidArgumentException("Invalid user ID");
        }

        $this->conn->begin_transaction();
        $filesToDelete = [];

        try {
            // 1. Check if user is a seller and get seller data
            $getSellerQuery = "SELECT id, image_path FROM seller WHERE userID = ?";
            $getSellerStmt = $this->conn->prepare($getSellerQuery);
            if (!$getSellerStmt) {
                throw new Exception("Prepare failed for seller data: " . $this->conn->error);
            }

            $getSellerStmt->bind_param("i", $userId);
            if (!$getSellerStmt->execute()) {
                throw new Exception("Execute failed for seller data: " . $getSellerStmt->error);
            }

            $sellerResult = $getSellerStmt->get_result();
            $sellerData = $sellerResult->fetch_assoc();
            $getSellerStmt->close();

            // If user is a seller, add their profile image to deletion list
            if ($sellerData) {
                $filesToDelete[] = $uploadDir . basename($sellerData['image_path']);
                $sellerId = $sellerData['id'];

                // 2. Get all vehicles belonging to this seller
                $getVehiclesQuery = "SELECT VehicleID FROM vehicles WHERE sellerID = ?";
                $getVehiclesStmt = $this->conn->prepare($getVehiclesQuery);
                if (!$getVehiclesStmt) {
                    throw new Exception("Prepare failed for vehicles: " . $this->conn->error);
                }

                $getVehiclesStmt->bind_param("i", $sellerId);
                if (!$getVehiclesStmt->execute()) {
                    throw new Exception("Execute failed for vehicles: " . $getVehiclesStmt->error);
                }

                $vehicleResult = $getVehiclesStmt->get_result();
                $vehicleIds = [];
                while ($row = $vehicleResult->fetch_assoc()) {
                    $vehicleIds[] = $row['VehicleID'];
                }
                $getVehiclesStmt->close();

                // 3. Process each vehicle (images and locations)
                foreach ($vehicleIds as $vehicleId) {
                    // Get all vehicle images
                    $getImagesQuery = "SELECT image_path FROM vehicle_images WHERE vehicle_id = ?";
                    $getImagesStmt = $this->conn->prepare($getImagesQuery);
                    if (!$getImagesStmt) {
                        throw new Exception("Prepare failed for vehicle images: " . $this->conn->error);
                    }

                    $getImagesStmt->bind_param("i", $vehicleId);
                    if (!$getImagesStmt->execute()) {
                        throw new Exception("Execute failed for vehicle images: " . $getImagesStmt->error);
                    }

                    $imageResult = $getImagesStmt->get_result();
                    while ($row = $imageResult->fetch_assoc()) {
                        $filesToDelete[] = $uploadDir . basename($row['image_path']);
                    }
                    $getImagesStmt->close();

                    // Delete vehicle images
                    $deleteImagesQuery = "DELETE FROM vehicle_images WHERE vehicle_id = ?";
                    $deleteImagesStmt = $this->conn->prepare($deleteImagesQuery);
                    if (!$deleteImagesStmt) {
                        throw new Exception("Prepare failed for image deletion: " . $this->conn->error);
                    }

                    $deleteImagesStmt->bind_param("i", $vehicleId);
                    if (!$deleteImagesStmt->execute()) {
                        throw new Exception("Execute failed for image deletion: " . $deleteImagesStmt->error);
                    }
                    $deleteImagesStmt->close();

                    // Delete vehicle location
                    $deleteLocationQuery = "DELETE FROM location WHERE VehicleID = ?";
                    $deleteLocationStmt = $this->conn->prepare($deleteLocationQuery);
                    if (!$deleteLocationStmt) {
                        throw new Exception("Prepare failed for location deletion: " . $this->conn->error);
                    }

                    $deleteLocationStmt->bind_param("i", $vehicleId);
                    if (!$deleteLocationStmt->execute()) {
                        throw new Exception("Execute failed for location deletion: " . $deleteLocationStmt->error);
                    }
                    $deleteLocationStmt->close();

                    // Delete the vehicle
                    $deleteVehicleQuery = "DELETE FROM vehicles WHERE VehicleID = ?";
                    $deleteVehicleStmt = $this->conn->prepare($deleteVehicleQuery);
                    if (!$deleteVehicleStmt) {
                        throw new Exception("Prepare failed for vehicle deletion: " . $this->conn->error);
                    }

                    $deleteVehicleStmt->bind_param("i", $vehicleId);
                    if (!$deleteVehicleStmt->execute()) {
                        throw new Exception("Execute failed for vehicle deletion: " . $deleteVehicleStmt->error);
                    }
                    $deleteVehicleStmt->close();
                }

                // 4. Delete seller profile
                $deleteSellerQuery = "DELETE FROM seller WHERE id = ?";
                $deleteSellerStmt = $this->conn->prepare($deleteSellerQuery);
                if (!$deleteSellerStmt) {
                    throw new Exception("Prepare failed for seller deletion: " . $this->conn->error);
                }

                $deleteSellerStmt->bind_param("i", $sellerId);
                if (!$deleteSellerStmt->execute()) {
                    throw new Exception("Execute failed for seller deletion: " . $deleteSellerStmt->error);
                }
                $deleteSellerStmt->close();
            }

            // 5. Finally delete the user
            $deleteUserQuery = "DELETE FROM users WHERE id = ?";
            $deleteUserStmt = $this->conn->prepare($deleteUserQuery);
            if (!$deleteUserStmt) {
                throw new Exception("Prepare failed for user deletion: " . $this->conn->error);
            }

            $deleteUserStmt->bind_param("i", $userId);
            if (!$deleteUserStmt->execute()) {
                throw new Exception("Execute failed for user deletion: " . $deleteUserStmt->error);
            }

            // Check if user was actually deleted
            if ($deleteUserStmt->affected_rows === 0) {
                throw new Exception("No user found with ID: $userId");
            }
            $deleteUserStmt->close();

            // Commit the transaction if all queries succeeded
            $this->conn->commit();

            // 6. Delete all associated files (only after successful DB commit)
            $this->DeleteImagesfromDIR($filesToDelete);

            return true;

        } catch (Exception $e) {
            // Roll back any changes if something went wrong
            $this->conn->rollback();
            error_log("deleteUserWithAllData transaction failed: " . $e->getMessage());
            throw $e; // Re-throw for the caller to handle
        }
    }


    private function DeleteImagesfromDIR(array $Paths) {
        foreach ($Paths as $filePath) {
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }
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
}