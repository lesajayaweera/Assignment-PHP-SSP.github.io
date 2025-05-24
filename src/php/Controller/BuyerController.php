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
}


