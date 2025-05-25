<?php
require_once("./src/php/Model/Seller.php");


class SellerController{
    public function edit_SellerDetails($fname, $lname, $email, $password, $description, $image) {
        $seller = new Seller($fname, $lname, $email, $password, $description, $image);
        if ($seller->Upload_seller_details($fname, $lname, $email, $password)) {
            // Update session
            $_SESSION['first_name'] = $fname;
            $_SESSION['last_name'] = $lname;

            echo '<script>alert("User details updated successfully!");</script>';
        } else {
            echo '<script>alert("Failed to update user details.");</script>';
        }

   
    }

    public function GetSellerDetails($email){
        $seller = new Seller();
       return $seller->getSellerDetails($email);
        

    }

    // in the seller page
    public function returnAllSellerCars($sellerId){
        $seller = new Seller();
        return $seller->getVehiclesWithMainImagesBySeller($sellerId);
    }

    public function getSellerOtherCars($vehicleID){
        $seller = new Seller();
        return $seller->getOtherAvailableVehiclesFromSameSeller($vehicleID);
    }

    public function getNegotiatedDeals(){
        $seller =new Seller();
        return $seller->getAllNegotiationsWithDetails();
    }

    public function handleNegotiations($negotiationId,$Response){
        $seller = new Seller();
        $result= $seller->handleNegotiationResponse($negotiationId,$Response);
        if(!$result){
            echo "Error in handling the Negotiations";
        }
    }

    public function GetTotal_ProductsOf_Seller($user_id){
        $seller = new Seller();
        return $seller->Get_Sellers_Product_Count($user_id);
    }

    public function Get_total_negotiation_deals($sellerID){
        $seller = new Seller();
        return $seller->getTotalNegotiationsofPrice($sellerID);
    }
    
    public function getTotal_done_sales($sellerID){
        $seller = new Seller();
        return $seller->getTotal_done_sales($sellerID);
    }

    public function getTotal_PendingOrders($sellerID){
        $seller = new Seller();
        return $seller->getTotal_PendingOrders($sellerID);
    }
}
