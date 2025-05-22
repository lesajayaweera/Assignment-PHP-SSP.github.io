<?php

require_once "./src/php/Model/Vehicle.php";

class VehicleController{

    


    public function AddCar($features,$make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description,$seller_id,$images){
        $vehicle  = new Vehicle($features,$make,$model,$year,$fuel_type,$cateogory,$transmission,$seats,$vehicle_condition,$engine,$width,$length,$height,$description);
        
        print_r($vehicle);
        $vehicle->AddCar($seller_id,$images);
        if($vehicle){
            echo "Sucess";

        }else{
            echo "failed";
        }
    }
}