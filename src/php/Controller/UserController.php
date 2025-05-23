<?php
include_once("./src/php/Model/User.php");

class UserController{
     
    public function register($first_name, $last_name, $email, $password, $role) {
        $user = new User($first_name, $last_name, $email, $password, $role);

        if ($user->save($first_name, $last_name, $email, $password)) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $first_name . " " . $last_name;
            $_SESSION['first_name'] =$first_name;
            $_SESSION['last_name'] =$last_name;
            $_SESSION['role'] = $role;
            $_SESSION['user_id'] = $user->GetUser_ID($email,$role);

            

            if($role =="admin"){
                header("Location:/Assignment/Admin/Dashboard");
                exit;
                
            }else if ($role =="seller"){
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
            $_SESSION['first_name'] =$user_data['firstName'];
            $_SESSION['last_name'] = $user_data['lastName'];
            $_SESSION['user_id'] =$user_data['id'];

            

            // Redirect to dashboard
            if($user_data['role'] ==="admin"){

                header("Location:/Assignment/Admin/Dashboard");
                exit;
            }else if ($user_data['role'] ==="seller"){
                require_once("./src/php/Controller/SellerController.php");
                $seller = new SellerController();
                $image =$seller->GetSellerDetails($user_data['email'])['Image_path'];
                $_SESSION['image'] = $image;
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