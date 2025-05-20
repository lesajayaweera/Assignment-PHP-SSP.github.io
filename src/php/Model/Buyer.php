<?php

class Buyer extends User {
    public function __construct($first_name, $last_name, $email, $password, $role) {
        parent::__construct($first_name, $last_name, $email, $password, $role);
    }

    public function Login() {
        // Buyer login logic
    }

    public function Register() {
        // Buyer registration logic
    }
}