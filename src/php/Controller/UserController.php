<?php
include_once("./src/php/Model/User.php");
require_once("./src/php/Controller/SellerController.php");
require_once("./src/php/Controller/BuyerController.php");


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
                $seller = new SellerController();
                 $image =$seller->GetSellerDetails($email)['image_path'];

                $_SESSION['image'] = $image;
                $_SESSION['seller_id'] =$seller->GetSellerDetails($email)['id'];

                header("Location:/Assignment/Seller/Dashboard");
                exit;
            }else if ($role =="buyer"){
                $buyer = new BuyerController();

                $image =$buyer->GetBuyerDetails($email)['image_path'];
                 $id =$buyer->GetBuyerDetails($email)['id'];
                 
                $_SESSION['image'] = $image;
                $_SESSION['buyerID'] = $id;
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
                 require_once("./src/php/Controller/AdminController.php");
                 $admin = new AdminController();
                 $image =$admin->GetAdminDetails($user_data['email'])['image_path'];
                $_SESSION['image'] = $image;



                header("Location:/Assignment/Admin/Dashboard");
                exit;
            }else if ($user_data['role'] ==="seller"){

                $seller = new SellerController();
                $image =$seller->GetSellerDetails($user_data['email'])['image_path'];

                $_SESSION['image'] = $image;
                $_SESSION['seller_id'] =$user_data['id'];

                header("Location:/Assignment/Seller/Dashboard");
                
                exit;

            }else if ($user_data['role'] =="buyer"){

                 $buyer = new BuyerController();

                 $image =$buyer->GetBuyerDetails($user_data['email'])['image_path'];
                 $id =$buyer->GetBuyerDetails($user_data['email'])['id'];
                 
                $_SESSION['image'] = $image;
                $_SESSION['buyerID'] = $id;

                header("Location:/Assignment/Listing");
                exit;
            }
        } else {
            // Show error or reload login view with message
            echo "Invalid email or password.";
        }
    }

    
}