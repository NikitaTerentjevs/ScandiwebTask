<?php

class MenuView extends MenuModel{

    public  function showItems(){       //Fetching all info from database, creating Product, and displaying it on index page in ItemBox
        $results =$this->getItems();
        $n=0;
        foreach($results as $row ){

            if($row['sizemb']!=NULL)
                $item = new DiskDVD($row['sku'],$row['name'],$row['price'],$row['sizemb']);
            elseif ($row['weight']!=NULL)
                $item = new Book($row['sku'],$row['name'],$row['price'],$row['weight']);
            else{
                $spec = $row['height']."_".$row['width']."_".$row['length'];
                $item = new Furniture($row['sku'],$row['name'],$row['price'],$spec);
            }

            ItemBox::createItemBox($item,$n);
            $n++;

        }
    }
}