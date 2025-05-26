<?php
session_start();
require_once("./src/php/Controller/BuyerController.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $favID = $_POST['favouriteid'];

    $controller = new BuyerController();
    $controller->moveFavoriteTocart($favID);

    header("Location:/Assignment/Cart");
    
}