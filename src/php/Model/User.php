<?php

abstract class User{
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $role;


    public function __construct($first_name, $last_name, $email, $password, $role){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->role = $role;
    }

    abstract public function Login();
    abstract public function Register();    

    public function getID(){}
}