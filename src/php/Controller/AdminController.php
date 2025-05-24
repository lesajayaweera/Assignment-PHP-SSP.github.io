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
}