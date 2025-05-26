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
                width, length, height, description, price, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')";
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

    public function EditCar($vehicleID, $images = [], $uploadDir = "./uploads/") {
        $this->conn->begin_transaction();
        $imageQueue = [];

        try {
            // 1. Always update vehicle details
            $vehicleQuery = "UPDATE vehicles SET 
                Make = ?, Model = ?, Year = ?, FuelType = ?, 
                cateogory = ?, Transmission = ?, Engine = ?, 
                Seats = ?, veh_condition = ?, width = ?, 
                length = ?, height = ?, description = ?, price = ? 
                WHERE VehicleID = ?";
                
            $vehicleStmt = $this->conn->prepare($vehicleQuery);
            if (!$vehicleStmt) throw new Exception("Vehicle prepare failed: " . $this->conn->error);

            $vehicleStmt->bind_param(
                "ssissssisssssdi",
                $this->make, $this->model, $this->year,
                $this->fuel_type, $this->cateogory, $this->transmission,
                $this->engine, $this->seats, $this->vehicle_condition,
                $this->width, $this->length, $this->height,
                $this->description, $this->price, $vehicleID
            );

            if (!$vehicleStmt->execute()) throw new Exception("Vehicle update failed: " . $vehicleStmt->error);
            $vehicleStmt->close();

            // 2. Always update location details
            $url = $this->extractSrcFromEmbed($this->embeded_link);
            $locationQuery = "UPDATE locations SET 
                street_no = ?, city = ?, 
                embededLink = ?, directionLink = ? 
                WHERE VehicleID = ?";
                
            $locationStmt = $this->conn->prepare($locationQuery);
            if (!$locationStmt) throw new Exception("Location prepare failed: " . $this->conn->error);

            $locationStmt->bind_param(
                "ssssi",
                $this->street, $this->city,
                $url, $this->direction_link, $vehicleID
            );

            if (!$locationStmt->execute()) throw new Exception("Location update failed: " . $locationStmt->error);
            $locationStmt->close();

            // 3. Only process images if actual new files are uploaded
            $validUploads = array_filter($images["tmp_name"] ?? [], function ($tmp) {
                return !empty($tmp);
            });

            if (!empty($validUploads)) {
                // Get existing images for cleanup
                $existingImages = [];
                $getImagesStmt = $this->conn->prepare("SELECT image_path FROM vehicle_images WHERE vehicle_id = ?");
                if ($getImagesStmt) {
                    $getImagesStmt->bind_param("i", $vehicleID);
                    if ($getImagesStmt->execute()) {
                        $result = $getImagesStmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            $existingImages[] = $row['image_path'];
                        }
                    }
                    $getImagesStmt->close();
                }

                // Delete existing image records
                $deleteStmt = $this->conn->prepare("DELETE FROM vehicle_images WHERE vehicle_id = ?");
                if ($deleteStmt) {
                    $deleteStmt->bind_param("i", $vehicleID);
                    $deleteStmt->execute();
                    $deleteStmt->close();
                }

                // Insert new images
                $imgStmt = $this->conn->prepare("INSERT INTO vehicle_images (vehicle_id, image_path, is_main) VALUES (?, ?, ?)");
                if ($imgStmt) {
                    $isFirst = true;
                    foreach ($images["name"] as $key => $filename) {
                        if (empty($images["tmp_name"][$key])) continue;

                        $tmp_name = $images["tmp_name"][$key];
                        $uniqueName = time() . "_" . uniqid() . "_" . basename($filename);
                        
                        $physicalPath = $uploadDir . $uniqueName;
                        $dbPath = "/Assignment/uploads/" . $uniqueName;
                        
                        $is_main = $isFirst ? 1 : 0;

                        $imgStmt->bind_param("isi", $vehicleID, $dbPath, $is_main);
                        $imgStmt->execute();

                        $imageQueue[] = [
                            "tmp_name" => $tmp_name,
                            "target" => $physicalPath
                        ];
                        $isFirst = false;
                    }
                    $imgStmt->close();
                }

                // Delete old physical files after DB operations succeed
                foreach ($existingImages as $oldImage) {
                    $oldPath = str_replace('/Assignment/uploads/', $uploadDir, $oldImage);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }
            }

            $this->conn->commit();

            // Move new uploaded files (if any)
            foreach ($imageQueue as $img) {
                if (!move_uploaded_file($img["tmp_name"], $img["target"])) {
                    error_log("Warning: Failed to move file to " . $img["target"]);
                }
            }

            return true;

        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Transaction failed: " . $e->getMessage());
            return false;
        }
    }




    //  method to get the vehicle details with the main image  if the vehicle is not in the orders table
    public function Get_available_vehicles_with_mainImage() {
        $query = "SELECT v.*, vi.image_path as main_image 
                    FROM vehicles v 
                    LEFT JOIN vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1
                    WHERE v.VehicleID NOT IN (SELECT vehicleID FROM orders)
                    AND v.status = 'approve'
                    ORDER BY v.VehicleID DESC";
        
        $result = $this->conn->query($query);
        $vehicles = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $vehicles[] = $row;
            }
        }
        return $vehicles;
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
                        u.image_path
                    FROM users u
                    WHERE u.id = ? AND u.role = 'seller'
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
        $vehicleExists = false;

        try {
            // 1. Check if vehicle exists and get image paths
            $checkVehicleQuery = "SELECT 1 FROM vehicles WHERE VehicleID = ?";
            $checkVehicleStmt = $this->conn->prepare($checkVehicleQuery);
            if (!$checkVehicleStmt) {
                throw new Exception("Prepare failed for vehicle check: " . $this->conn->error);
            }
            
            $checkVehicleStmt->bind_param("i", $vehicleID);
            if (!$checkVehicleStmt->execute()) {
                throw new Exception("Execute failed for vehicle check: " . $checkVehicleStmt->error);
            }
            
            $vehicleExists = $checkVehicleStmt->get_result()->num_rows > 0;
            $checkVehicleStmt->close();

            if (!$vehicleExists) {
                $this->conn->rollback();
                return false; // Vehicle doesn't exist, nothing to delete
            }

            // 2. Get all image paths (for file cleanup)
            $getImagesQuery = "SELECT image_path FROM vehicle_images WHERE vehicle_id = ?";
            $getImagesStmt = $this->conn->prepare($getImagesQuery);
            if ($getImagesStmt) { // Only proceed if prepare succeeded
                $getImagesStmt->bind_param("i", $vehicleID);
                if ($getImagesStmt->execute()) {
                    $result = $getImagesStmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $imagePaths[] = $uploadDir . basename($row['image_path']);
                    }
                }
                $getImagesStmt->close();
            }

            // 3. Delete from dependent tables (no error if doesn't exist)
            $tablesToDeleteFrom = [
                'orders' => 'vehicleID',
                'negotiations' => 'vehicleID',
                'favorites' => 'vehicleID',
                'vehicle_images' => 'vehicle_id',
                'locations' => 'VehicleID'
            ];

            foreach ($tablesToDeleteFrom as $table => $column) {
                $query = "DELETE FROM $table WHERE $column = ?";
                $stmt = $this->conn->prepare($query);
                if ($stmt) { // Only proceed if prepare succeeded
                    $stmt->bind_param("i", $vehicleID);
                    $stmt->execute(); // Don't throw error if fails
                    $stmt->close();
                }
            }

            // 4. Delete from vehicles table
            $deleteVehicleQuery = "DELETE FROM vehicles WHERE VehicleID = ?";
            $deleteVehicleStmt = $this->conn->prepare($deleteVehicleQuery);
            if ($deleteVehicleStmt) {
                $deleteVehicleStmt->bind_param("i", $vehicleID);
                $deleteVehicleStmt->execute();
                $deleteVehicleStmt->close();
            }

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

    public function getPendingVehiclesWithDetails() {
        $query = "SELECT 
                    v.*,
                    u.id as seller_id,
                    u.firstName as seller_first_name,
                    u.lastName as seller_last_name,
                    u.email as seller_email,
                    u.role as seller_role,
                    u.image_path as seller_image,
                    GROUP_CONCAT(vi.image_path) as vehicle_images,
                    GROUP_CONCAT(vi.is_main) as image_main_flags
                FROM vehicles v
                JOIN users u ON v.sellerID = u.id
                LEFT JOIN vehicle_images vi ON v.VehicleID = vi.vehicle_id
                WHERE v.status = 'pending'
                GROUP BY v.VehicleID";

        $result = $this->conn->query($query);
        
        if (!$result) {
            error_log("Database error: " . $this->conn->error);
            return [];
        }

        $vehicles = [];
        while ($row = $result->fetch_assoc()) {
            // Process vehicle images
            $imagePaths = $row['vehicle_images'] ? explode(',', $row['vehicle_images']) : [];
            $imageFlags = $row['image_main_flags'] ? explode(',', $row['image_main_flags']) : [];
            $images = [];
            
            foreach ($imagePaths as $index => $path) {
                $images[] = [
                    'path' => $path,
                    'is_main' => isset($imageFlags[$index]) ? (bool)$imageFlags[$index] : false
                ];
            }

            // Structure the response
            $vehicles[] = [
                'vehicle' => [
                    'id' => $row['VehicleID'],
                    'make' => $row['Make'],
                    'model' => $row['Model'],
                    'year' => $row['Year'],
                    'price' => $row['price'],
                    'cateogory' => $row['cateogory'],
                    'fueltype'=>$row['FuelType'],
                    'transmission'=>$row['Transmission']
                    // Include other vehicle fields as needed
                ],
                'seller' => [
                    'id' => $row['seller_id'],
                    'firstName' => $row['seller_first_name'],
                    'lastName' => $row['seller_last_name'],
                    'email' => $row['seller_email'],
                    'role' => $row['seller_role'],
                    'image' => $row['seller_image']
                ],
                'images' => $images
            ];
        }

        return $vehicles;
    }

    public function UpdateVehicleStatus($vehicleID, $approve = true) {
        $this->conn->begin_transaction();
        $imagePaths = [];

        try {
            if ($approve) {
                // APPROVE - Update status to 'approved'
                $stmt = $this->conn->prepare("UPDATE vehicles SET status = 'approve' WHERE VehicleID = ?");
                if (!$stmt) throw new Exception("Prepare failed for approval: " . $this->conn->error);
                
                $stmt->bind_param("i", $vehicleID);
                if (!$stmt->execute()) throw new Exception("Approval failed: " . $stmt->error);
                
                $stmt->close();
            } else {
                // DISAPPROVE - Delete vehicle and all related data
                
                // 1. Get all image paths for physical file deletion
                $getImagesStmt = $this->conn->prepare("SELECT image_path FROM vehicle_images WHERE vehicle_id = ?");
                if ($getImagesStmt) {
                    $getImagesStmt->bind_param("i", $vehicleID);
                    if ($getImagesStmt->execute()) {
                        $result = $getImagesStmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            $imagePaths[] = $row['image_path'];
                        }
                    }
                    $getImagesStmt->close();
                }

                // 2. Delete from vehicle_images table
                $deleteImagesStmt = $this->conn->prepare("DELETE FROM vehicle_image WHERE vehicle_id = ?");
                if ($deleteImagesStmt) {
                    $deleteImagesStmt->bind_param("i", $vehicleID);
                    $deleteImagesStmt->execute();
                    $deleteImagesStmt->close();
                }

                // 3. Delete from locations table (if exists)
                $deleteLocationStmt = $this->conn->prepare("DELETE FROM locations WHERE VehicleID = ?");
                if ($deleteLocationStmt) {
                    $deleteLocationStmt->bind_param("i", $vehicleID);
                    $deleteLocationStmt->execute();
                    $deleteLocationStmt->close();
                }

                // 4. Delete from vehicles table
                $deleteVehicleStmt = $this->conn->prepare("DELETE FROM vehicles WHERE VehicleID = ?");
                if ($deleteVehicleStmt) {
                    $deleteVehicleStmt->bind_param("i", $vehicleID);
                    if (!$deleteVehicleStmt->execute()) throw new Exception("Vehicle deletion failed");
                    $deleteVehicleStmt->close();
                }

                // 5. Delete physical image files
                foreach ($imagePaths as $imagePath) {
                    // Convert DB path to filesystem path
                    $filePath = str_replace('/Assignment/uploads/', './uploads/', $imagePath);
                    if (file_exists($filePath)) {
                        @unlink($filePath);
                    }
                }
            }

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Vehicle status change failed: " . $e->getMessage());
            return false;
        }
    }
    public function getFavoritesWithMainImage($buyerID) {
        $query = "
            SELECT 
                f.id AS favorite_id,
                f.createdAt AS favorited_date,
                v.VehicleID,
                v.Make,
                v.Model,
                v.Year,
                v.price,
                v.status,
                v.description,
                vi.image_path AS main_image,
                u.id AS seller_id,
                u.firstName AS seller_firstName,
                u.lastName AS seller_lastName,
                u.image_path AS seller_image
            FROM favourites f
            JOIN vehicles v ON f.vehicleID = v.VehicleID
            LEFT JOIN vehicle_images vi ON v.VehicleID = vi.vehicle_id AND vi.is_main = 1
            JOIN users u ON v.sellerID = u.id
            WHERE f.buyerID = ? AND v.status = 'approve'
            ORDER BY f.createdAt DESC
        ";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $buyerID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $favorites = [];
            while ($row = $result->fetch_assoc()) {
                $favorites[] = [
                    'favorite_id' => $row['favorite_id'],
                    'favorited_date' => $row['favorited_date'],
                    'vehicle' => [
                        'id' => $row['VehicleID'],
                        'make' => $row['Make'],
                        'model' => $row['Model'],
                        'year' => $row['Year'],
                        'price' => $row['price'],
                        'status' => $row['status'],
                        'description' => $row['description'],
                        'main_image' => $row['main_image'] ?? null
                    ],
                    'seller' => [
                        'id' => $row['seller_id'],
                        'firstName' => $row['seller_firstName'],
                        'lastName' => $row['seller_lastName'],
                        'image' => $row['seller_image']
                    ]
                ];
            }
            
            return [
                'success' => true,
                'data' => $favorites
            ];
            
        } catch (Exception $e) {
            error_log("Error fetching favorites: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Failed to load favorite items'
            ];
        }
    }

        





}