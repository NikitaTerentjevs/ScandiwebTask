<?php

class MenuModel extends Dbh {

    protected function getItems(){      //Fetching all information for MenuView to display
        $sql ="SELECT pr.sku,pr.name,pr.price,bk.weight,dsk.sizemb,frn.height,frn.width,frn.length
        FROM product AS pr 
        LEFT OUTER JOIN book AS bk ON bk.pr_sku=pr.sku 
        LEFT OUTER JOIN diskdvd AS dsk ON dsk.pr_sku=pr.sku 
        LEFT OUTER JOIN furniture AS frn ON frn.pr_sku=pr.sku";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();    //redundant variable for better understanding
        return $result;
    }



    private function getTypeString($typeID){     //to find type string with ID
        $sql = "SELECT name FROM pr_type  where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$typeID]);

        return $stmt->fetchColumn(0);
    }
    private function getTypeID($typeString): int{     //to find type ID with string
        $sql = "SELECT id FROM pr_type  where name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$typeString]);

        return $stmt->fetchColumn(0);
    }

    private function isSet(Product $item){      //checks if item exists
        $sql = "SELECT sku FROM product WHERE sku =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$item->getSKU()]);

        return $stmt->fetchColumn(0) != NULL;
    }

    protected function setItemStmt(Product $item){

        if($this->isSet($item)){
            return false;
        }
        else {
            $type = strtolower($item->getClass());
            $sql = "INSERT INTO product VALUES (?, ?, ?, ?);INSERT INTO " . $type;
            if ($type == "book" || $type == "diskdvd") {
                $sql .= " VALUES (?,?)";
                $spec = explode(" ", $item->getSpecAttribute())[1];  //used to get value out of string, which is 2nd in exploded string

                $stmt = $this->connect()->prepare($sql);
                return $stmt->execute([
                    $item->getSKU(),
                    $item->getName(),
                    $item->getPrice(),
                    $this->getTypeID($item->getClass()),

                    $item->getSKU(),
                    $spec
                ]);
            }
            else if ($type == "furniture") {
                $sql .= " VALUES (?,?,?,?)";
                $spec = explode(" ", $item->getSpecAttribute())[1];
                $spec = explode("x", $spec); //[0]=>height;[1]=>width;[2]=>length

                $stmt = $this->connect()->prepare($sql);
                return $stmt->execute([
                    $item->getSKU(),
                    $item->getName(),
                    $item->getPrice(),
                    $this->getTypeID($item->getClass()),

                    $item->getSKU(),
                    $spec[0],
                    $spec[1],
                    $spec[2]
                ]);
            }
        }
    }

    private function deleteBySKU($sku){     //returns true of false for debugging purposes
        $sql ="DELETE FROM product WHERE sku = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$sku]);
    }
    private function deleteByType($type,$sku){      //deletes product from tables of respective Type
        $sql ="DELETE FROM ".$type." WHERE pr_sku = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$sku]);

    }
    protected function deleteItem(int $sku){    //deleting process is handled here

        $sql = "SELECT type_id from product where sku = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]);
        $type = $this->getTypeString($stmt->fetchColumn(0));
        $type = strtolower($type);

        return $this->deleteByType($type,$sku) && $this->deleteBySKU($sku);



    }

}