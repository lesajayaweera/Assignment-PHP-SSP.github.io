<?php

require_once "./src/php/Model/Vehicle.php";

class VehicleController{

    private $vehicle;

    // constructor
    public function __construct()
    {
        $this->vehicle= new Vehicle();
    }

    public function AddCar(){
        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            
        }
    }
}