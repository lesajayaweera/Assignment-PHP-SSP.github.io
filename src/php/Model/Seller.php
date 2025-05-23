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

                // Update user details
                $updateUser = $this->conn->prepare("UPDATE users SET firstName=?, lastName=?, password=? WHERE email=?");
                $updateUser->bind_param("ssss", $fname, $lname, $hashed_password, $email);
                $updateUser->execute();

                if ($updateUser->affected_rows < 0) {
                    throw new Exception("<script>alert('User details didn't update properly');</script>");
                }

                // Get user ID
                $getUserID = $this->conn->prepare("SELECT id FROM users WHERE email=?");
                $getUserID->bind_param("s", $email);
                $getUserID->execute();
                $result = $getUserID->get_result();
                $user = $result->fetch_assoc();
                $userID = $user['id'];

                // Handle image upload
                $uploadDir = "/Assignment/uploads/";
                $imageName = basename($this->image['name']);
                $targetPath = $_SERVER['DOCUMENT_ROOT'] . $uploadDir . $imageName;
                $relativePath = $uploadDir . $imageName;

                if (!move_uploaded_file($this->image['tmp_name'], $targetPath)) {
                    throw new Exception("Image upload failed.");
                }

                // Check if seller exists
                $checkSeller = $this->conn->prepare("SELECT id FROM seller WHERE userID=?");
                $checkSeller->bind_param("i", $userID);
                $checkSeller->execute();
                $checkResult = $checkSeller->get_result();

                if ($checkResult->num_rows > 0) {
                    // Seller exists: UPDATE
                    $updateSeller = $this->conn->prepare("UPDATE seller SET Description=?, Image_path=? WHERE userID=?");
                    $updateSeller->bind_param("ssi", $this->description, $relativePath, $userID);
                    $updateSeller->execute();

                    if ($updateSeller->affected_rows < 0) {
                        throw new Exception("Seller update failed.");
                    }
                } else {
                    // Seller does not exist: INSERT
                        $insertSeller = $this->conn->prepare("INSERT INTO seller (userID, Description, Image_path) VALUES (?, ?, ?)");
                        $insertSeller->bind_param("iss", $userID, $this->description, $relativePath);
                        $insertSeller->execute();

                        if ($insertSeller->affected_rows <= 0) {
                            throw new Exception("Seller insert failed.");
                        }
                    }

                    // Commit transaction
                    $this->conn->commit();
                    return true;

            } catch (Exception $e) {
                $this->conn->rollback();
                error_log("Transaction failed: " . $e->getMessage());
                return false;
            }
        } else {
            return false;
        }
    }


    public function getSellerDetails($email) {
    try {
        $query = "
            SELECT 
                u.firstName, 
                u.lastName, 
                u.email, 
                s.Description, 
                s.Image_path
            FROM 
                users u
            INNER JOIN 
                seller s ON u.id = s.userID
            WHERE 
                u.email = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $sellerData = $result->fetch_assoc();
            return $sellerData;  // Returns an associative array
        } else {
            return null;  // Seller not found
        }

    } catch (Exception $e) {
        error_log("Failed to fetch seller details: " . $e->getMessage());
        return false;
    }
}


}
