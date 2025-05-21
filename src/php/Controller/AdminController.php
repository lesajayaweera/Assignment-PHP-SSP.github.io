<?php
require_once("./src/php/Model/Admin.php"); ?>


<?php

class AdminController{
    

    public function Register($first_name,$last_name,$email,$password,$role){
        $admin = new Admin($first_name,$last_name,$email,$password,$role);

        print_r($admin);
        $admin->Register();
    }
}