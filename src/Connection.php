<?php
namespace BatoiPOP;

use PDO;

class Connection
{
    public static function make($bd){
        try {
            return new \PDO("mysql:host=localhost;port=3306;dbname=${bd}", 'batoi', '1234');
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
}