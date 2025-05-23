<?php

if ($_SERVER['REQUEST_METHOD']==="GET"){
    if(isset($_GET['id'])){
        require_once("./src/php/Controller/VehicleController.php");
        $id= $_GET['id'];

        $vehicle = new VehicleController;
        $location ="Location:/Assignment/Seller/ManageProducts";
        $vehicle->deleteCar($id,$location);
    }
    else{
        header("Location:/Assignment/Login");
        exit;
    }
}