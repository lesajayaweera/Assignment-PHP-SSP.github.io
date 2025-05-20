<?php

include("./src/php/Model/Brand.php");

class BrandController{
    private $brand;

    public function __construct()
    {
        $this->brand = new Brand();
    }

    public function DisplayAll(){
        return  $this->brand->DisplayAll();
    }

    public function DisplayByID($id){
        $result=  $this->brand->FindByID($id);

        return [
            "ID"=>$result->GetBrandID(),
            "Name"=>$result->GetBrand(),
            "Description"=>$result->GetBrandDescription()
        ];

    }


}