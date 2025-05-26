<?php
session_start();
require_once("./src/php/Controller/BuyerController.php");
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}

    (int)$vehicle_id= $_SESSION['vId'];
    (int)$buyId =  $_SESSION['buyerID'];

    $controller = new BuyerController;
    $controller->Addtofavourites($vehicle_id,$buyId);



