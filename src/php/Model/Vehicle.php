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

    public function __construct( $make = "", $model = "", $year = "", $fuel_type = "", $cateogory = "", $transmission = "", $seats = "", $vehicle_condition = "", $engine = "", $width = "", $length = "", $height = "", $description = "",$price=0) {
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
    }

    public function AddCar($sellerID, $images = [], $uploadDir = "./uploads/") {
        $this->conn->begin_transaction();
        $imageQueue = [];

        try {
            // Insert into vehicles (unchanged)
            $query = "INSERT INTO vehicles 
                (sellerID, Make, Model, Year, FuelType, cateogory, Transmission, Engine, Seats, veh_condition, width, length, height, description, price) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            if (!$stmt) throw new Exception("Vehicle prepare failed: " . $this->conn->error);

            $stmt->bind_param(
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

            if (!$stmt->execute()) throw new Exception("Vehicle insert failed: " . $stmt->error);
            $vehicleID = $this->conn->insert_id;
            $stmt->close();

            // Insert vehicle images
            if (!empty($images["name"]) && is_array($images["name"])) {
                $imgStmt = $this->conn->prepare("INSERT INTO vehicle_images (vehicle_id, image_path, is_main) VALUES (?, ?, ?)");
                if (!$imgStmt) throw new Exception("Image prepare failed: " . $this->conn->error);

                $isFirst = true;
                foreach ($images["name"] as $key => $filename) {
                    if (empty($images["tmp_name"][$key])) continue;

                    $tmp_name = $images["tmp_name"][$key];
                    $uniqueName = time() . "_" . uniqid() . "_" . basename($filename);
                    
                    // Physical storage path (unchanged)
                    $physicalPath = $uploadDir . $uniqueName;
                    
                    // Database storage path (modified)
                    $dbPath = "/Assignment/uploads/" . $uniqueName;
                    
                    $is_main = $isFirst ? 1 : 0;

                    $imgStmt->bind_param("isi", $vehicleID, $dbPath, $is_main);
                    if (!$imgStmt->execute()) {
                        throw new Exception("Image insert failed: " . $imgStmt->error);
                    }

                    $imageQueue[] = [
                        "tmp_name" => $tmp_name,
                        "target" => $physicalPath  // Still using ./uploads/ for actual storage
                    ];
                    $isFirst = false;
                }
                $imgStmt->close();
            }

            $this->conn->commit();

            // Move uploaded files (using original ./uploads/ location)
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
    public function Get_everyThing_by_ID($id){
        $query ="SELECT * FROM vehicles WHERE VehicleID = ?";
        $stmt =$this->conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $v_result =$stmt->get_result();
        $vehicle = $v_result->fetch_assoc();
        $stmt->close();

        if(!$vehicle){
            return null;
        }
        $imagesQuery = "SELECT * FROM vehicle_images WHERE vehicle_id = ? ORDER BY is_main DESC";
        $imgStmt = $this->conn->prepare($imagesQuery);
        $imgStmt->bind_param("i", $vehicleId);
        $imgStmt->execute();
        $imagesResult = $imgStmt->get_result();
        $images = [];
        
        while ($imgRow = $imagesResult->fetch_assoc()) {
            $images[] = $imgRow;
        }
        
        $imgStmt->close();
        $vehicle['images'] = $images;
        return $vehicle;


    }


}