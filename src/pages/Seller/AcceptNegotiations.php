<?php
require_once("./src/php/Controller/SellerController.php");
session_start();

$negotiatedID = null;

if(!isset($_SESSION['email']) || $_SESSION['role'] !== "seller" ){
    header("Location:/Assignment/Logout");
    exit;
}

if($_SERVER['REQUEST_METHOD']==="GET"){
    $negotiatedID = $_GET['id'];

    $controller = new SellerController();
    $controller->handleNegotiations($negotiatedID,true);
    header("Location:/Assignment/Seller/Negotiations");



}