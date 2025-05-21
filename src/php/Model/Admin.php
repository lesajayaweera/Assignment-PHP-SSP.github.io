<?php 
require_once("./src/php/Model/User.php");
class Admin extends User{
    public function __construct($first_name,$last_name,$email,$password,$role){
        parent::__construct($first_name,$last_name,$email,$password,$role);
    }
    public function Login(){
        
    }
    public function Register(){
        if($this->SaveData()){
            echo "<script> alert('Admin Registration is sucessfull')</script>";
            header("Location:/Assignment/Admin/Dashboard");
        }
        else{
             echo "<script> alert('Admin Registration is un sucessfull')</script>";
        }
    }
}