<?php
include_once("./src/php/Model/User.php");

class UserController{
     
    public function register($first_name, $last_name, $email, $password, $role) {
        $user = new User($first_name, $last_name, $email, $password, $role);

        if ($user->save()) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $first_name . " " . $last_name;
            $_SESSION['role'] = $role;
            $_SESSION['user_id'] = $user->GetUser_ID($email,$role);

            echo $_SESSION['user_id'];

            if($role ==="admin"){
                header("Location:/Assignment/Admin/Dashboard");
                exit;
            }else if ($role ==="seller"){
                header("Location:/Assignment/Seller/Dashboard");
                exit;
            }else if ($role =="buyer"){
                header("Location:/Assignment/Listing");
                exit;
            }
        } else {
            // Show error (could also load an error view)
            echo "<script>alert('Registration failed.');</script>";
        }
    }

    public function login($email, $password) {
        $user = new User();
        $user_data = $user->authenticate($email, $password);

        if ($user_data) {
            session_start();
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['name'] = $user_data['firstName'] . " " . $user_data['lastName'];
            $_SESSION['role'] = $user_data['role'];
            $_SESSION['user_id'] =$user_data['id'];

            

            // Redirect to dashboard
            if($user_data['role'] ==="admin"){
                header("Location:/Assignment/Admin/Dashboard");
                exit;
            }else if ($user_data['role'] ==="seller"){
                header("Location:/Assignment/Seller/Dashboard");
                exit;
            }else if ($user_data['role'] =="buyer"){
                header("Location:/Assignment/Listing");
                exit;
            }
        } else {
            // Show error or reload login view with message
            echo "Invalid email or password.";
        }
    }

    
}