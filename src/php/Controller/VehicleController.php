<?php

require_once "../Model/Vehicle.php";

class VehicleController{

    private $vehicle;

    // constructor
    public function __construct()
    {
        $this->vehicle= new Vehicle();
    }

    public function addCar(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $this->vehicle->addCar([
                'make' => $_POST['make'],
                'model' => $_POST['model'],
                'year' => $_POST['year'],
                'seats' => $_POST['seats'],
                'price' => $_POST['price'],
                'mileage' => $_POST['mileage'],
                'description' => $_POST['description'],
                'length'=> $_POST['length'],
                'width'=> $_POST['width'],
                'height'=> $_POST['height'],
                'engine'=> $_POST['engine'],
                'transmission'=> $_POST['transmission'],
                'fuel'=> $_POST['fuel'],

            ]);

            if(!empty($_POST['features'])){
                $this->vehicle->addFeatures($_POST['features']);

            }
            if(!empty($_FILES['images'])){
                $this->vehicle->addImages($_FILES['images']);
            }

            echo "<script>alert('Car added successfully');</script>";
        }
        
    }
    public function editCar(){}
    public function removeCar(){}
}