<?php

class Dbh {

    /*
     * I use xampp to test my php code, so be aware that You might
     * have to change $user and $pwd variables to match your program
     */

    private string $host = "localhost";
    private string $user = "root";
    private string $pwd = "";   //password
    private string $dbName = "product_db";

    protected function connect(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $pdo = new PDO($dsn,$this->user,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }
}