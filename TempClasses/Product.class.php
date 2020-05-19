<?php

abstract class Product{     //created to make program more generic
    private string $sku;
    private string $name;
    private float $price;

    public function __construct(string $sku, string $name, float $price){
        $this->name = $name;
        $this->price = $price;
        $this->sku = $sku;
    }

    public function getName() : string{
        return $this->name;
    }

    public function getSKU() : string{
        return $this->sku;
    }

    public function getPrice() : string{
        return $this->price;
    }
    abstract public static function getClass();     //returns type of subclass
    abstract public function getSpecAttribute();
}
