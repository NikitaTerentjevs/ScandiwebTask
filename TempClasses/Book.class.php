<?php

class Book extends Product{
    private float $weight;

    public function __construct(string $sku, string $name, float $price, float $weight){
        $this->weight =$weight;
        parent::__construct($sku, $name, $price);
    }

    public function getSpecAttribute(){
        return "Weight: ".$this->weight." KG"; //Return string for product list to display at once
    }
    public static function getClass(){
        return "Book";
    }



}
