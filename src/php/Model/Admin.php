<?php 
require_once("./src/php/Model/User.php");
class Admin extends User{
    public function __construct($first_name,$last_name,$email,$password,$role){
        parent::__construct($first_name,$last_name,$email,$password,$role);
    }
    public function Login(){
        
    }
}