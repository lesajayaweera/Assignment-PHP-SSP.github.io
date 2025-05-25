<?php
require_once("./src/php/Model/Admin.php"); ?>


<?php

class AdminController{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin;
    }

    public function LoadAllUsers(){
        return $this->admin->getNonAdminUsers();
    }

    public function deleteAccounts($id, $location){
        $result = $this->admin->deleteNonAdminUsers($id);

        if($result){
            echo "<script>alert('user deleted successfully!');</script>";
            header($location);
            exit;

        }
        else{
            echo "<script>alert('failed to delete user!');</script>";
            header($location);
            exit;
        }
        
    }

    public function EditAdmin($fname,$lname,$email,$password,$image){
        $conn= new Admin;
        $conn->EditUser($fname,$lname,$email,$password,$image);

    }

    public function GetAdminDetails($email){
        return $this->admin->GetUserDetails($email);
    }


    public function Get_total_($tablename){
        return $this->admin->getTotals($tablename);
    }

    public function GetTotalSales(){
        return $this->admin->getCompletedOrdersSum();
    }
}