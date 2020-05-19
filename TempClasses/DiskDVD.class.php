<?php
class DiskDVD extends Product{
    private float $sizeMB;

    public function __construct(string $sku, string $name, float $price, float $sizeMB)
    {
        $this->sizeMB =$sizeMB;
        parent::__construct($sku, $name, $price);
    }

    public static function getClass(){
        return "DiskDVD";
    }

    public function getSpecAttribute()
    {
        return "Size: ".$this->sizeMB." MB"; //Return string for product list to display at once
    }
}