<?php

class Furniture extends Product{
    private float $height;
    private float $width;
    private float $length;

    public function __construct(string $sku, string $name, float $price,string $Height_Width_Length)
    {
        $attributeArray = explode("_",$Height_Width_Length);        //made that way to simplify product adding process

        $this->height = $attributeArray[0];
        $this->width = $attributeArray[1];
        $this->length =$attributeArray[2];
        parent::__construct($sku, $name, $price);
    }

    public function getSpecAttribute() {
        return "Dimensions: ".$this->height."x".$this->width."x".$this->length;  //Return string for product list to display at once
    }

    public static function getClass(){
        return "Furniture";
    }
}