<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'buyer') {
    header("Location: /Assignment/Login");
    exit;
}

if ($_SERVER['REQUEST_METHOD']==="POST"){
     $favID = $_POST['favouriteid'];

     $controller = new BuyerController();
    $controller->removeFavorite($favID);

    header("Location:/Assignment/Listing");
}


