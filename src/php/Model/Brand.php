<?php include('./src/php/Model/Database.php'); ?>
<?php

class Brand {

    private $brandName ;
    private $brandDescription;
    private $brandID;
    private $conn;
    private $tableName ='brand';

    public function __construct($brandName = null,$brandID =null ,$brandDescription=null)
    {
        $database = new Database();
        $this->conn = $database->getConnection();
        if ($brandName !== null && $brandID !== null && $brandDescription !== null ) {
            $this->brandName = $brandName;
            $this->brandID=$brandID;
            $this->brandDescription =$brandDescription;
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
        $query = "SELECT Id, Make, Description FROM " . $this->tableName . " WHERE Id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            error_log("Brand::findById prepare failed: " . $this->conn->error);
            return null; // Or throw an exception for clearer error handling
        }

        $stmt->bind_param('i', $id); // 'i' for integer
        $stmt->execute();
        $result = $stmt->get_result(); // Get a mysqli_result object

        if ($row = $result->fetch_assoc()) {
            return new Brand( $row['Make'],$row['Id'], $row['Description']);
        }
        return null; // Brand not found
    }

    public function GetBrand(){
        return $this->brandName;
    }
    public function GetBrandID(){
        return $this->brandID;
    }
    public function GetBrandDescription(){
        return $this->brandDescription;
    }
    
    
}