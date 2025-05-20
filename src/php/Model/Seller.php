<?php

class Seller extends User {
    public function __construct($first_name, $last_name, $email, $password, $role) {
        parent::__construct($first_name, $last_name, $email, $password, $role);
    }

    public function Login() {
        // Seller login logic
    }

    public function Register() {
        // Seller registration logic
    }
}