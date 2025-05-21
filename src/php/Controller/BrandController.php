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
            "Description"=>$result->GetBrandDescription(),
            "Image_1"=>$result->GetImage_1(),
            "Image_2"=>$result->GetImage_2(),
            "Image_3"=>$result->GetImage_3(),
        ];

    }


}