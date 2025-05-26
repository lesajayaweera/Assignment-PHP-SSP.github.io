<?php

require_once "./src/php/Model/Vehicle.php";

class VehicleController{
    private $vehicle;

    public function __construct()
    {
        $this->vehicle = new Vehicle();
    }

    


    public function AddCar($make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description,$price,$street,$city,$embeded_link,$direction_link,$seller_id,$images){
        $vehicle  = new Vehicle($make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description,$price,$street,$city,$embeded_link,$direction_link);
        
        
        
        $vehicle->AddCar($seller_id,$images);
        if($vehicle){
            echo "<script> $make $model is sucessfully added </script>" ;

        }else{
            echo "<script> Listing is Unscessfull </script>" ;
        }
    }

    public function EditCar($make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description,$price,$street,$city,$embeded_link,$direction_link,$vehicle_id,$images){
        $vehicle  = new Vehicle($make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description,$price,$street,$city,$embeded_link,$direction_link);
        $vehicle->EditCar($vehicle_id,$images);
        if($vehicle){
            header("Location:/Assignment/Seller/ManageProducts");
            exit;

        }else{
            echo "<script> ('Listing is Unscessful') </script>" ;
        }

    }

    public function Load_all_with_main_Image(){
       return $this->vehicle->Get_available_vehicles_with_mainImage();
    }

    public function Load_everything_by_Id($vehicle_id){
        return $this->vehicle->Get_everyThing_by_ID($vehicle_id);
    }

    public function deleteCar($vehicleID,$location){
        try {
            $result = $this->vehicle->DeleteCar($vehicleID);
            if($result){
                echo "<script>alert('Vehicle and all associated data deleted successfully!');</script>";
                header($location);
                exit;
            }
            else{
                echo "<script>alert('Vehicle Deletion is failed!');</script>";
                header($location);
                exit;
            }
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();

        }
    }

    public function Get_pending_listing(){
        return $this->vehicle->getPendingVehiclesWithDetails();
    }

    
}