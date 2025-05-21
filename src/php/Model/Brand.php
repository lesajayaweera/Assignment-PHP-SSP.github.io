<?php include('./src/php/Model/Database.php'); ?>
<?php

class Brand {

    private $brandName ;
    private $brandDescription;
    private $brandID;
    private $image_1;
    private $image_2;
    private $image_3;
    private $conn;
    private $tableName ='brand';

    public function __construct($brandName = null,$brandID =null ,$brandDescription=null,$image_1 =null,$image_2 =null,$image_3 =null)
    {
        $database = new Database();
        $this->conn = $database->getConnection();
        if ($brandName !== null && $brandID !== null && $brandDescription !== null && $image_1 !== null&& $image_2 !== null&& $image_3 !== null ) {
            $this->brandName = $brandName;
            $this->brandID=$brandID;
            $this->brandDescription =$brandDescription;
            $this->image_1 =$image_1;
            $this->image_2=$image_2;
            $this->image_3=$image_3;
        }
    }

    public function displayAll(){
        $sql = "SELECT Id, Make FROM " . $this->tableName . " ORDER BY Make ASC";;
        $result = $this->conn->query($sql);
        if($result ===false){
            die("Error executing query: " . $this->conn->error);
        }

        $data=[];
        if($result->num_rows >0 ){
            while ($row = $result->fetch_assoc()) {
                $data[] = $row; // Add each row to the data array
            }
        }
        return $data;
    }

    public function FindByID($id){
        $query = "SELECT Id, Make, Description, image_path_1, image_path_2, image_path_3  FROM " . $this->tableName . " WHERE Id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            error_log("Brand::findById prepare failed: " . $this->conn->error);
            return null; // Or throw an exception for clearer error handling
        }

        $stmt->bind_param('i', $id); // 'i' for integer
        $stmt->execute();
        $result = $stmt->get_result(); // Get a mysqli_result object

        if ($row = $result->fetch_assoc()) {
            return new Brand( $row['Make'],$row['Id'], $row['Description'],$row['image_path_1'],$row['image_path_2'],$row['image_path_3']);
        }
        return null; // Brand not found
    }

    //  Getters for the brand Name
    public function GetBrand(){
        return $this->brandName;
    }
    // Getter for the brand Id
    public function GetBrandID(){
        return $this->brandID;
    }

    //  Getter to the Brand Descriptions
    public function GetBrandDescription(){
        return $this->brandDescription;
    }

    public function GetImage_1(){
        return $this->image_1;
    }
    
    public function GetImage_2(){
        return $this->image_2;
    }

    public function GetImage_3(){
        return $this->image_3;
    }
    
    
}