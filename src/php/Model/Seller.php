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
    function getOtherVehiclesFromSameSeller($vehicleId) {
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


}
