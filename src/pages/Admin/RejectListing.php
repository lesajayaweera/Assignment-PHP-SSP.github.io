<?php  
require_once("./src/php/Controller/VehicleController.php");
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: /Assignment/Login");
    exit;
}
if ($_SERVER['REQUEST_METHOD']==="GET"){
    $vehicleID = $_GET['id'];

    $controller = new VehicleController();
    $result=$controller->UpdateTheVehicleStatus($vehicleID,false);
    if ($result){
        echo "<script>alert('Approved');</script>";
    }

    header("Location:/Assignment/Admin/ManageListings");

    
}