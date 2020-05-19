<?php
class MenuContr extends MenuModel{
    public function createItem(Product $item){
        return $this->setItemStmt($item);
    }
    public function removeItem(string $sku){
        return $this->deleteItem($sku);
    }
}