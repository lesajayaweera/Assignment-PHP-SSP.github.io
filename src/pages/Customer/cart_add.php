<?php
require_once('./src/php/Controller/BuyerController.php');

session_start();

$vehicle_id =null;

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}

if($_SERVER['REQUEST_METHOD']==="GET"){

    echo $_GET ['id'];
    echo $_SESSION['buyerID'];
    if(isset($_GET['id'])){
        $vehicle_id=(int)$_GET['id'];
        
    }
}


$controller = new BuyerController();

$controller->CreateOrder($vehicle_id,$_SESSION['buyerID']);

header("Location:/Assignment/ViewDetails?id=$vehicle_id");
exit;
