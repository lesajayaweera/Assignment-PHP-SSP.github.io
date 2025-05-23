<?php

class Validator{


    private static function ValidateEmail($email) {
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) < 255) {
                return true;
            } else {
                echo "Invalid Email Format<br>";
                return false;
            }
        } else {
            echo "Email is mandatory<br>";
            return false;
        }
    }

    private static function ValidateNames($first_name,$last_name) {
        if (!empty($first_name) && !empty($last_name)) {
            if (preg_match("/^[a-zA-Z-' ]*$/", $first_name) && preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
                return true;
            } else {
                echo "Name can only contain letters, spaces, hyphens, and apostrophes.<br>";
                return false;
            }
        } else {
            echo "First and last name are mandatory<br>";
            return false;
        }
    }

    private static function ValidatePassword($password) {
        if (!empty($password)) {
            if (strlen($password) >= 8) {
                return true;
            } else {
                echo "The password must have a minimum of 8 characters<br>";
                return false;
            }
        } else {
            echo "The password is mandatory<br>";
            return false;
        }
    }

    public static function ValidateCredentials($first_name,$last_name,$email,$password) {
        return self::ValidateEmail($email) && self::ValidateNames($first_name,$last_name) && self::ValidatePassword($password);
    }

    
}