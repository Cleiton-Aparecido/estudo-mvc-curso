<?php

namespace App;



class Connection{
    
    public function getDb(){
        try {
            $conn = New \PDO("mysql:dbname=mvc;host=localhost","root","");
            return $conn;
        } catch (\PDOException $e) {
            echo "erro:".$e->getMessage();
        }
    }
}

?>