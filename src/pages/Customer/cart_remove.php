<?php
require_once("./src/php/Controller/BuyerController.php");
$cartID = null;
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}

if ($_SERVER['REQUEST_METHOD']==="GET"){
    if(isset($_GET['id'])){
        $cartID =$_GET['id'];
        $controller = new BuyerController();
        $controller->removeItemFromCart($cartID);

    }
    else{
        header("Location:/Assignment/Cart");
        exit;
    }
}