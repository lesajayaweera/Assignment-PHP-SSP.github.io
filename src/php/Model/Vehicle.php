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

            $url =$this->extractSrcFromEmbed($this->embeded_link);
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

    private function extractSrcFromEmbed($embedCode) {
    if (empty($embedCode)) return '';
    
    // Use regex to extract src attribute
    if (preg_match('/src="([^"]+)"/', $embedCode, $matches)) {
        return $matches[1];
    }
    
    // If no match found, return original (might be already a URL)
    return $embedCode;
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
        // Step 1: Get vehicle data
        $query = "SELECT * FROM vehicles WHERE VehicleID = ?";
        $stmt = $this->conn->prepare($query);
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
        $locationStmt->bind_param("i", $id);
        $locationStmt->execute();
        $locationResult = $locationStmt->get_result();
        $location = $locationResult->fetch_assoc();
        $locationStmt->close();

        $vehicle['location'] = $location;

        // Step 4: Get seller details (from seller and users tables)
        $sellerQuery = "
            SELECT 
                u.id AS user_id,
                u.firstName,
                u.lastName,
                u.email,
                s.Description,
                s.Image_path
            FROM seller s
            JOIN users u ON s.userID = u.id
            WHERE s.userID = ?
        ";

        $sellerStmt = $this->conn->prepare($sellerQuery);
        $sellerStmt->bind_param("i", $vehicle['sellerID']);
        $sellerStmt->execute();
        $sellerResult = $sellerStmt->get_result();
        $seller = $sellerResult->fetch_assoc();
        $sellerStmt->close();

        $vehicle['seller'] = $seller;

        return $vehicle;
    }



    





}