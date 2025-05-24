<?php require_once ("./src/php/Model/Database.php"); ?>

<?php
class Vehicle {
    private $conn;
    private $price;
    private $make;
    private $model;
    private $year;
    private $fuel_type;
    private $cateogory;
    private $transmission;
    private $seats;
    private $engine;
    private $vehicle_condition;
    private $width;
    private $length;
    private $height;
    private $description;
    private $street;
    private $city;
    private $embeded_link;
    private $direction_link;

    public function __construct( $make = "", $model = "", $year = "", $fuel_type = "", $cateogory = "", $transmission = "", $seats = "", $vehicle_condition = "", $engine = "", $width = "", $length = "", $height = "", $description = "",$price=0,$street="",$city="",$embeded_link="",$direction_link="") {
        $db = new Database;
        $this->conn = $db->getConnection();
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->fuel_type = $fuel_type;
        $this->cateogory = $cateogory;
        $this->transmission = $transmission;
        $this->seats = $seats;
        $this->engine = $engine;
        $this->vehicle_condition = $vehicle_condition;
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
        $this->description = $description;
        $this->price =$price;
        $this->street =$street;
        $this->city =$city;
        $this->embeded_link =$embeded_link;
        $this->direction_link =$direction_link;
    }

    public function AddCar($sellerID, $images = [], $uploadDir = "./uploads/") {
        $this->conn->begin_transaction();
        $imageQueue = [];

        try {
            // Insert into vehicles table
            $vehicleQuery = "INSERT INTO vehicles 
                (sellerID, Make, Model, Year, FuelType, cateogory, Transmission, Engine, Seats, veh_condition, 
                width, length, height, description, price) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $vehicleStmt = $this->conn->prepare($vehicleQuery);
            if (!$vehicleStmt) throw new Exception("Vehicle prepare failed: " . $this->conn->error);

            $vehicleStmt->bind_param(
                "ississssisssssd",
                $sellerID,
                $this->make,
                $this->model,
                $this->year,
                $this->fuel_type,
                $this->cateogory,
                $this->transmission,
                $this->engine,
                $this->seats,
                $this->vehicle_condition,
                $this->width,
                $this->length,
                $this->height,
                $this->description,
                $this->price
            );

            if (!$vehicleStmt->execute()) throw new Exception("Vehicle insert failed: " . $vehicleStmt->error);
            $vehicleID = $this->conn->insert_id;
            $vehicleStmt->close();

            // Insert into locations table
            $locationQuery = "INSERT INTO locations 
                (VehicleID, street_no, city, embededLink, directionLink) 
                VALUES (?, ?, ?, ?, ?)";
            $locationStmt = $this->conn->prepare($locationQuery);
            if (!$locationStmt) throw new Exception("Location prepare failed: " . $this->conn->error);

            $url = $this->extractSrcFromEmbed($this->embeded_link);
            $locationStmt->bind_param(
                "issss",
                $vehicleID,
                $this->street,
                $this->city,
                $url,
                $this->direction_link
            );

            if (!$locationStmt->execute()) throw new Exception("Location insert failed: " . $locationStmt->error);
            $locationStmt->close();

            // Insert vehicle images
            if (!empty($images["name"]) && is_array($images["name"])) {
                $imgStmt = $this->conn->prepare("INSERT INTO vehicle_images (vehicle_id, image_path, is_main) VALUES (?, ?, ?)");
                if (!$imgStmt) throw new Exception("Image prepare failed: " . $this->conn->error);

                $isFirst = true;
                foreach ($images["name"] as $key => $filename) {
                    if (empty($images["tmp_name"][$key])) continue;

                    $tmp_name = $images["tmp_name"][$key];
                    $uniqueName = time() . "_" . uniqid() . "_" . basename($filename);
                    
                    $physicalPath = $uploadDir . $uniqueName;
                    $dbPath = "/Assignment/uploads/" . $uniqueName;
                    
                    $is_main = $isFirst ? 1 : 0;

                    $imgStmt->bind_param("isi", $vehicleID, $dbPath, $is_main);
                    if (!$imgStmt->execute()) {
                        throw new Exception("Image insert failed: " . $imgStmt->error);
                    }

                    $imageQueue[] = [
                        "tmp_name" => $tmp_name,
                        "target" => $physicalPath
                    ];
                    $isFirst = false;
                }
                $imgStmt->close();
            }

            $this->conn->commit();

            // Move uploaded files
            foreach ($imageQueue as $img) {
                if (!move_uploaded_file($img["tmp_name"], $img["target"])) {
                    error_log("Warning: Failed to move file to " . $img["target"]);
                }
            }

            return $vehicleID;

        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Transaction failed: " . $e->getMessage());
            return false;
        }
    }

    public function extractSrcFromEmbed($embedCode) {
        if (empty(trim($embedCode))) {
            return '';
        }

        // Decode HTML entities (e.g., &quot; → ")
        $decoded = htmlspecialchars_decode($embedCode);

        // Normalize quotes and whitespace
        $normalized = preg_replace('/\s+/', ' ', $decoded);
        $normalized = str_replace(["'"], '"', $normalized);

        // Extract src attribute
        if (preg_match('/src="([^"]+)"/i', $normalized, $matches)) {
            return trim($matches[1]);
        }

        // Fallback: Check if input is already a URL
        if (filter_var(trim($embedCode), FILTER_VALIDATE_URL)) {
            return trim($embedCode);
        }

        return ''; // Return empty if no match
    }

    public function EditCar($vehicleId, $newImages) {
        // Start transaction
        $this->conn->begin_transaction();

        try {
            // 1. Update vehicle table
            $stmt = $this->conn->prepare("UPDATE vehicles SET 
                Make = ?, 
                Model = ?, 
                Year = ?, 
                FuelType = ?, 
                category = ?, 
                Transmission = ?, 
                Seats = ?, 
                veh_condition = ?, 
                Engine = ?, 
                width = ?, 
                length = ?, 
                height = ?, 
                description = ?, 
                price = ? 
                WHERE VehicleID = ?");

            if (!$stmt) {
                throw new Exception("Prepare failed for vehicle update: " . $this->conn->error);
            }

            $stmt->bind_param("ssisssssisddssi", 
                $this->make,
                $this->model,
                $this->year,
                $this->fuel_type,
                $this->cateogory,
                $this->transmission,
                $this->seats,
                $this->vehicle_condition,
                $this->engine,
                $this->width,
                $this->length,
                $this->height,
                $this->description,
                $this->price,
                $vehicleId
            );

            if (!$stmt->execute()) {
                throw new Exception("Vehicle update failed: " . $stmt->error);
            }
            $stmt->close();

            // 2. Handle location update/insert
            $locationStmt = $this->conn->prepare("SELECT LocationID FROM locations WHERE VehicleID = ?");
            $locationStmt->bind_param("i", $vehicleId);
            $locationStmt->execute();
            $result = $locationStmt->get_result();
            $locationExists = $result->num_rows > 0;
            $locationStmt->close();

            if ($locationExists) {
                $locationStmt = $this->conn->prepare("UPDATE locations SET 
                    street_no = ?, 
                    city = ?, 
                    embeddedLink = ?, 
                    directionLink = ? 
                    WHERE VehicleID = ?");
                
                if (!$locationStmt) {
                    throw new Exception("Prepare failed for location update: " . $this->conn->error);
                }

                $locationStmt->bind_param("ssssi",
                    $this->street,
                    $this->city,
                    $this->embeded_link,
                    $this->direction_link,
                    $vehicleId
                );
            } else {
                $locationStmt = $this->conn->prepare("INSERT INTO locations 
                    (VehicleID, street_no, city, embeddedLink, directionLink) 
                    VALUES (?, ?, ?, ?, ?)");

                if (!$locationStmt) {
                    throw new Exception("Prepare failed for location insert: " . $this->conn->error);
                }

                $locationStmt->bind_param("issss",
                    $vehicleId,
                    $this->street,
                    $this->city,
                    $this->embeded_link,
                    $this->direction_link
                );
            }

            if (!$locationStmt->execute()) {
                throw new Exception("Location operation failed: " . $locationStmt->error);
            }
            $locationStmt->close();

            // 3. Handle image updates
            if (!empty($newImages['name'][0])) {
                // Delete existing images (database + filesystem)
                $existingImages = [];
                $selectStmt = $this->conn->prepare("SELECT image_path FROM vehicle_images WHERE vehicle_id = ?");
                $selectStmt->bind_param("i", $vehicleId);
                $selectStmt->execute();
                $result = $selectStmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $existingImages[] = $row['image_path'];
                }
                $selectStmt->close();

                $deleteStmt = $this->conn->prepare("DELETE FROM vehicle_images WHERE vehicle_id = ?");
                $deleteStmt->bind_param("i", $vehicleId);
                if (!$deleteStmt->execute()) {
                    throw new Exception("Failed to delete existing images: " . $deleteStmt->error);
                }
                $deleteStmt->close();

                foreach ($existingImages as $oldImage) {
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }

                // Insert new images
                $uploadDir = './uploads/';
                $imageStmt = $this->conn->prepare("INSERT INTO vehicle_images (vehicle_id, image_path, is_main) VALUES (?, ?, ?)");

                if (!$imageStmt) {
                    throw new Exception("Prepare failed for image insert: " . $this->conn->error);
                }

                for ($i = 0; $i < count($newImages['name']); $i++) {
                    if ($newImages['error'][$i] === UPLOAD_ERR_OK) {
                        $tmpName = $newImages['tmp_name'][$i];
                        $fileName = uniqid() . '_' . basename($newImages['name'][$i]);
                        $targetPath = $uploadDir . $fileName;

                        if (move_uploaded_file($tmpName, $targetPath)) {
                            $isMain = ($i === 0) ? 1 : 0;
                            $imageStmt->bind_param("isi", $vehicleId, $targetPath, $isMain);
                            if (!$imageStmt->execute()) {
                                throw new Exception("Failed to insert image: " . $imageStmt->error);
                            }
                        } else {
                            throw new Exception("Failed to upload image: " . $newImages['name'][$i]);
                        }
                    }
                }
                $imageStmt->close();
            }

            // Commit transaction if all operations succeeded
            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            // Rollback on error
            $this->conn->rollback();
            error_log("Edit car failed: " . $e->getMessage());
            return false;
        }
    }



    //  method to get the vehicle details with the main image
    public function Get_details_with_mainImage(){
        $query = "SELECT v.*, vi.image_path as main_image FROM vehicles v LEFT JOIN vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1 ORDER BY v.VehicleID DESC";
        $result =$this->conn->query($query);
        $vehicle =[];

        if($result && $result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                $vehicle[] =$row;
            }
        }
        return $vehicle;
    }

    //  function to load car details inside the veiwDetails page
    public function Get_everyThing_by_ID($id) {
        try {
            // Verify database connection first
            if (!$this->conn) {
                throw new Exception("Database connection failed");
            }

            // Step 1: Get vehicle data
            $query = "SELECT * FROM vehicles WHERE VehicleID = ?";
            $stmt = $this->conn->prepare($query);
            
            if ($stmt === false) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $v_result = $stmt->get_result();
            $vehicle = $v_result->fetch_assoc();
            $stmt->close();

            if (!$vehicle) {
                return null;
            }

            // Step 2: Get vehicle images
            $imagesQuery = "SELECT * FROM vehicle_images WHERE vehicle_id = ? ORDER BY is_main DESC";
            $imgStmt = $this->conn->prepare($imagesQuery);
            
            if ($imgStmt === false) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            
            $imgStmt->bind_param("i", $id);
            $imgStmt->execute();
            $imagesResult = $imgStmt->get_result();
            $images = [];

            while ($imgRow = $imagesResult->fetch_assoc()) {
                $images[] = $imgRow;
            }

            $imgStmt->close();
            $vehicle['images'] = $images;

            // Step 3: Get location details
            $locationQuery = "SELECT * FROM locations WHERE VehicleID = ?";
            $locationStmt = $this->conn->prepare($locationQuery);
            
            if ($locationStmt === false) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            
            $locationStmt->bind_param("i", $id);
            $locationStmt->execute();
            $locationResult = $locationStmt->get_result();
            $location = $locationResult->fetch_assoc();
            $locationStmt->close();

            $vehicle['location'] = $location;

            // Step 4: Get seller details
            $sellerQuery = "
            SELECT 
                u.id AS user_id,
                u.firstName,
                u.lastName,
                u.email,
                u.image_path,
                s.Description
                FROM seller s
                JOIN users u ON s.userID = u.id
                WHERE s.userID = ?
            ";

            $sellerStmt = $this->conn->prepare($sellerQuery);
            
            if ($sellerStmt === false) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            
            $sellerStmt->bind_param("i", $vehicle['sellerID']);
            $sellerStmt->execute();
            $sellerResult = $sellerStmt->get_result();
            $seller = $sellerResult->fetch_assoc();
            $sellerStmt->close();

            $vehicle['seller'] = $seller;

            return $vehicle;

        } catch (Exception $e) {
            error_log("Error in Get_everyThing_by_ID: " . $e->getMessage());
            return [
                'error' => true,
                'message' => 'Failed to load vehicle details',
                'system_message' => $e->getMessage()
            ];
        }
    }

    public function DeleteCar($vehicleID, $uploadDir = "./uploads/") {
        // Validate input
        if (!is_numeric($vehicleID) || $vehicleID <= 0) {
            throw new InvalidArgumentException("Invalid vehicle ID");
        }

        $this->conn->begin_transaction();
        $imagePaths = [];

        try {
            // 1. Get all image paths before deletion (for file cleanup)
            $getImagesQuery = "SELECT image_path FROM vehicle_images WHERE vehicle_id = ?";
            $getImagesStmt = $this->conn->prepare($getImagesQuery);
            if (!$getImagesStmt) {
                throw new Exception("Prepare failed for image paths: " . $this->conn->error);
            }

            $getImagesStmt->bind_param("i", $vehicleID);
            if (!$getImagesStmt->execute()) {
                throw new Exception("Execute failed for image paths: " . $getImagesStmt->error);
            }

            $result = $getImagesStmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $imagePaths[] = $uploadDir . basename($row['image_path']);
            }
            $getImagesStmt->close();

            // 2. Delete from vehicle_images table
            $deleteImagesQuery = "DELETE FROM vehicle_images WHERE vehicle_id = ?";
            $deleteImagesStmt = $this->conn->prepare($deleteImagesQuery);
            if (!$deleteImagesStmt) {
                throw new Exception("Prepare failed for image deletion: " . $this->conn->error);
            }

            $deleteImagesStmt->bind_param("i", $vehicleID);
            if (!$deleteImagesStmt->execute()) {
                throw new Exception("Execute failed for image deletion: " . $deleteImagesStmt->error);
            }
            $deleteImagesStmt->close();

            // 3. Delete from locations table
            $deleteLocationQuery = "DELETE FROM locations WHERE VehicleID = ?";
            $deleteLocationStmt = $this->conn->prepare($deleteLocationQuery);
            if (!$deleteLocationStmt) {
                throw new Exception("Prepare failed for location deletion: " . $this->conn->error);
            }

            $deleteLocationStmt->bind_param("i", $vehicleID);
            if (!$deleteLocationStmt->execute()) {
                throw new Exception("Execute failed for location deletion: " . $deleteLocationStmt->error);
            }
            $deleteLocationStmt->close();

            // 4. Delete from vehicles table
            $deleteVehicleQuery = "DELETE FROM vehicles WHERE VehicleID = ?";
            $deleteVehicleStmt = $this->conn->prepare($deleteVehicleQuery);
            if (!$deleteVehicleStmt) {
                throw new Exception("Prepare failed for vehicle deletion: " . $this->conn->error);
            }

            $deleteVehicleStmt->bind_param("i", $vehicleID);
            if (!$deleteVehicleStmt->execute()) {
                throw new Exception("Execute failed for vehicle deletion: " . $deleteVehicleStmt->error);
            }

            // Check if any rows were affected
            if ($deleteVehicleStmt->affected_rows === 0) {
                throw new Exception("No vehicle found with ID: $vehicleID");
            }
            $deleteVehicleStmt->close();

            // Commit the transaction if all queries succeeded
            $this->conn->commit();

            // 5. Delete the actual image files (only after successful DB commit)
            $this->deleteImageFiles($imagePaths);

            return true;

        } catch (Exception $e) {
            // Roll back any changes if something went wrong
            $this->conn->rollback();
            error_log("DeleteCar transaction failed: " . $e->getMessage());
            throw $e; // Re-throw for the caller to handle
        }
    }

/**
 * Helper method to delete physical image files
 * 
 * @param array $imagePaths Array of file paths to delete
 */
    private function deleteImageFiles(array $imagePaths) {
        foreach ($imagePaths as $filePath) {
            try {
                if (file_exists($filePath)) {
                    if (!unlink($filePath)) {
                        error_log("Warning: Failed to delete image file: " . $filePath);
                    }
                }
            } catch (Exception $e) {
                error_log("Error deleting file $filePath: " . $e->getMessage());
                // Continue with other files even if one fails
            }
        }
    }


    





}