<?php require_once ("./src/php/Model/Database.php"); ?>

<?php
class Vehicle {
    private $conn;
    private $features;
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

    public function __construct($features = [], $make = "", $model = "", $year = "", $fuel_type = "", $cateogory = "", $transmission = "", $seats = "", $vehicle_condition = "", $engine = "", $width = "", $length = "", $height = "", $description = "") {
        $db = new Database;
        $this->conn = $db->getConnection();
        $this->features = $features;
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
    }

    public function AddCar($sellerID, $images = [], $uploadDir = "./uploads/") {
        $this->conn->begin_transaction();
        $imageQueue = [];

        try {
            // Insert into vehicles
            $query = "INSERT INTO vehicles 
                (sellerID, Make, Model, Year, FuelType, cateogory, Transmission, Engine, Seats, veh_condition, width, length, height, description) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            if (!$stmt) throw new Exception("Vehicle prepare failed: " . $this->conn->error);

            $stmt->bind_param(
                "ississssisssss",
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
                $this->description
            );

            if (!$stmt->execute()) throw new Exception("Vehicle insert failed: " . $stmt->error);
            $vehicleID = $this->conn->insert_id;
            $stmt->close();

            // Insert features
            if (!empty($this->features)) {
                $this->features = array_unique($this->features); // Remove duplicates

                foreach ($this->features as $featureName) {
                    // Check if feature exists
                    $featCheckStmt = $this->conn->prepare("SELECT FeatureID FROM features WHERE FeatureName = ?");
                    if (!$featCheckStmt) throw new Exception("Feature check prepare failed: " . $this->conn->error);
                    
                    $featCheckStmt->bind_param("s", $featureName);
                    if (!$featCheckStmt->execute()) throw new Exception("Feature check execute failed: " . $featCheckStmt->error);
                    
                    $featCheckStmt->bind_result($featureID);
                    $featureExists = $featCheckStmt->fetch();
                    $featCheckStmt->close();

                    // If feature doesn't exist, insert it
                    if (!$featureExists) {
                        $insertFeatStmt = $this->conn->prepare("INSERT INTO features (FeatureName) VALUES (?)");
                        if (!$insertFeatStmt) throw new Exception("Feature insert prepare failed: " . $this->conn->error);
                        
                        $insertFeatStmt->bind_param("s", $featureName);
                        if (!$insertFeatStmt->execute()) {
                            throw new Exception("Feature insert failed: " . $insertFeatStmt->error);
                        }
                        $featureID = $insertFeatStmt->insert_id;
                        $insertFeatStmt->close();
                    }

                    // Link feature to vehicle
                    $featStmt = $this->conn->prepare("INSERT INTO vehiclefeatures (vehicleID, featureID) VALUES (?, ?)");
                    if (!$featStmt) throw new Exception("vehiclefeatures insert prepare failed: " . $this->conn->error);
                    
                    $featStmt->bind_param("ii", $vehicleID, $featureID);
                    if (!$featStmt->execute()) {
                        throw new Exception("vehiclefeatures insert failed: " . $featStmt->error);
                    }
                    $featStmt->close();
                }
            }

            // Insert vehicle images (handling multiple uploads)
            if (!empty($images["name"]) && is_array($images["name"])) {
                $imgStmt = $this->conn->prepare("INSERT INTO vehicle_images (vehicle_id, image_path, is_main) VALUES (?, ?, ?)");
                if (!$imgStmt) throw new Exception("Image prepare failed: " . $this->conn->error);

                $isFirst = true;
                foreach ($images["name"] as $key => $filename) {
                    // Skip if there's no file for this index
                    if (empty($images["tmp_name"][$key])) ;

                    $tmp_name = $images["tmp_name"][$key];
                    $uniqueName = time() . "_" . uniqid() . "_" . basename($filename);
                    $targetPath = $uploadDir . $uniqueName;
                    $is_main = $isFirst ? 1 : 0;

                    $imgStmt->bind_param("isi", $vehicleID, $targetPath, $is_main);
                    if (!$imgStmt->execute()) {
                        throw new Exception("Image insert failed: " . $imgStmt->error);
                    }

                    $imageQueue[] = [
                        "tmp_name" => $tmp_name,
                        "target" => $targetPath
                    ];
                    $isFirst = false;
                }
                $imgStmt->close();
            }

            $this->conn->commit();

            // Move uploaded files after successful transaction
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
}