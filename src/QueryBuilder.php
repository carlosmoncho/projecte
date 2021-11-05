<?php

namespace BatoiPOP;

class QueryBuilder
{
    protected $connexio;


    public function __construct($connexio)
    {
        $this->connexio = $connexio;
    }

    public function selectAll($table){
        $stpdo = $this->connexio->prepare("SELECT * FROM `$table`");
        $stpdo->execute();
        return $stpdo->fetchAll(\PDO::FETCH_OBJ);
    }

    public function orderByStars($table){
        $stpdo = $this->connexio->prepare("SELECT * FROM `$table`WHERE stars = 5");
        $stpdo->execute();
        return $stpdo->fetchAll(\PDO::FETCH_OBJ);
    }

    public function orderByDate($table){
        $stpdo = $this->connexio->prepare("SELECT * FROM `$table` order by `createdAt` desc");
        $stpdo->execute();
        return $stpdo->fetchAll(\PDO::FETCH_OBJ);
    }

    public function selectAllLimit($table, $maximo){
        $stpdo = $this->connexio->prepare("SELECT * FROM `$table` LIMIT 0,$maximo");
        $stpdo->execute();
        return $stpdo->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findById($table, $id){
        $stpdo = $this->connexio->prepare("SELECT * FROM `$table` WHERE `id` = '$id'");
        $stpdo->execute();
        return $stpdo->fetch(\PDO::FETCH_OBJ);
    }

    public function findByEmail($table, $email){
        $stpdo = $this->connexio->prepare("SELECT * FROM `$table` WHERE `email` = '$email'");
        $stpdo->execute();
        return $stpdo->fetch(\PDO::FETCH_OBJ);
    }

    public function deleteProduct($table, $id){
        $stpdo = $this->connexio->prepare("DELETE FROM `$table` WHERE `id` = '$id'");
        $stpdo->execute();
    }

    public function update($table, $id,$camps){
        $stpdo = $this->connexio->prepare(" UPDATE $table SET $camps WHERE `id` = '$id'");
        $stpdo->execute();
    }
    public function insert($nomtaula, $camps){
        $arrayKeySeparadoPorComas = implode("`,`", array_keys($camps));
        $campsInsertar = implode("','", $camps);
        $stpdo = $this->connexio->prepare(" insert into $nomtaula (`$arrayKeySeparadoPorComas`) values ('$campsInsertar')");
        $stpdo->execute();
    }
    public function login($table,$email,$password){
        $stpdo = $this->connexio->prepare("SELECT * FROM $table WHERE email = :email");
        $stpdo->bindValue(":email",$email);
        $stpdo->execute();
        $user = $stpdo->fetch(\PDO::FETCH_OBJ);
        if (empty($user)){
            throw new \Exception('EL nom o la contraseña no son correctes');
        }
        if (password_verify($password,$user->password))return $user;
        return null;
    }
    public function validationEmail($table,$email,$token){
        $stpdo = $this->connexio->prepare("SELECT * FROM $table WHERE `email` = '$email' AND `token_recup` = '$token'");
        $stpdo->execute();
        return $stpdo->fetch(\PDO::FETCH_OBJ);

    }
}