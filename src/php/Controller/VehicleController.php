<?php

require_once "./src/php/Model/Vehicle.php";

class VehicleController{
    private $vehicle;

    public function __construct()
    {
        $this->vehicle = new Vehicle();
    }

    


    public function AddCar($make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description,$price,$seller_id,$images){
        $vehicle  = new Vehicle($make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description,$price);
        
        
        
        $vehicle->AddCar($seller_id,$images);
        if($vehicle){
            echo "<script> $make $model is sucessfully added </script>" ;

        }else{
            echo "<script> Listing is Unscessfull </script>" ;
        }
    }

    public function Load_all_with_main_Image(){
       return $this->vehicle->Get_details_with_mainImage();
    }

    public function Load_everything_by_Id($vehicle_id){
        return $this->vehicle->Get_everyThing_by_ID($vehicle_id);
    }
}