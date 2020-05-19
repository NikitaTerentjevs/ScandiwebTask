<?php

class ItemBox
{
    public static function createItemBox(Product $item,int $n){
        echo'<div class="col-lg-3 col-md-6 col-sm-12" >
            <p><input type="checkbox" name="items[]" class="item'.$n.'" value='.$item->getSKU().'>SKU: '.$item->getSKU().'</p>   <!-- value = Item"s sku, to find item by the sku in tables -->
            <p>Name: '.$item->getName().'</p>
            <p>Price: '.$item->getPrice().'$</p>
            <p>'.$item->getSpecAttribute().'</p>
        </div>';
    }
}