<?php
require_once("./src/php/Model/Buyer.php");

class BuyerController{

    private $buyer;

    public function __construct()
    {
        $this->buyer = new Buyer();
    }

    public function EditBuyer($fname,$lname,$email,$password,$image){
        $buyer = new Buyer();
        $buyer->EditUser($fname,$lname,$email,$password,$image);

    }
    public function GetBuyerDetails($email){
        return $this->buyer->GetUserDetails($email);
    }
    public function Negotiate($vehicleID, $buyerID, $negotiatedPrice){
        $result =$this->buyer->insertNegotiation($vehicleID, $buyerID, $negotiatedPrice);
        if ($result){
            echo "<script>alert('Negotiation is sent !')</script>";
           
        }
        else{
            echo "<script>alert('Negotiation didnt sent !')</script>";
           
        }
    }

    public function LoadCart($buyerID){
        return $this->buyer->getBuyerCartWithDetails($buyerID);
    }

    public function removeItemFromCart($cartID){
        $result =$this->buyer->removeFromCart($cartID);
        if($result){
            header("Location:/Assignment/Cart");
            exit;
        }
        else{
            echo "<script>alert('the item didnt deleted')</script>";
        }
    }

    public function CreateOrder($vehicleId,$BuyerID){
        $result =$this->buyer->createOrder($vehicleId,$BuyerID);
        if($result){
            header("Location:/Assignment/Listing");
            exit;
        }
        else{
            echo "<script>alert('vehicle didnt add to the cart')</script>";

        }
    }

    public function getTheCartTotal($buyerID){
        return $this->buyer->getCompleteCartSummary($buyerID);
    }

    

    public function InsertBillingAndCompleteOrder($buyerID, $address, $apartment, $city, $country, $zipcode){
         $this->buyer->insertOrUpdateBillingInfo($buyerID, $address, $apartment, $city, $country, $zipcode);
         $result =$this->buyer->completeBuyerOrders($buyerID);

         if ($result){
            header("Location:/Assignment/Checkout");
         }else{
            echo "<script>alert('failed to complete the order')</script>";
         }
    }

    public function Addtofavourites($vehicleID, $buyerID){
       $result= $this->buyer->addToFavorites($vehicleID, $buyerID);
       if($result){
        echo "<script>alert('Add to Favourites')</script>";
        header("Location:/Assignment/Favourites");
        exit;
       }else{
            echo "<script>alert('failed to Add to Favourites')</script>";
       }
    }

    public function moveFavoriteTocart($fav_id){
        $result =$this->buyer->moveFavoriteTocart($fav_id);
        if($result['success']){
            echo "<script>alert('moved to the cart');</script>";
        }
    }
    public function removeFavorite($fav_id){
        $result =$this->buyer->removeFavorite($fav_id);
        if($result['success']){
            echo "<script>alert('moved to the cart');</script>";
        }
    }

}