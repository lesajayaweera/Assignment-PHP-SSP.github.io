<?php


session_start();
if ($_SERVER['REQUEST_METHOD']==="GET"){
    if(isset($_GET['uid'])){
        require_once("./src/php/Controller/AdminController.php");
        $id= $_GET['uid'];

        $admin = new AdminController;
        $location ="Location:/Assignment/Admin/ManageAccounts";
        $admin->deleteAccounts($id,$location);
    }
    else{
        if($_SESSION['role']==="admin"){
            header("Location:/Assignment/Admin/ManageAccounts");
            exit;
        }
        else{
            header("Location:/Assignment/Login");
            exit;
        }
    }
    
}