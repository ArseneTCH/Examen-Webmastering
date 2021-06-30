<?php
namespace ism\models;
use ism\lib\FormatDate;
use ism\lib\AbstractModel;

class UserModel extends AbstractModel{

    public function __construct() {
        parent::__construct();
        $this->tableName = "utilisateur";
        $this->primaryKey = "id";
    }

    public function selectUserByLoginPassword(string $login):array{
        $sql= "SELECT * FROM $this->tableName 
        WHERE login=?";
        $result=$this->selectBy($sql,[$login],true);
        return $result["count"]==0?[]:$result["data"];
    }
    
    public function loginExiste(string $login):bool{
        $sql= "SELECT * FROM $this->tableName WHERE login=:login";
        $result=$this->selectBy($sql,[':login'=>$login],true);
        return $result["count"]==0?false:true;
    }
    public function Delete(string $login):void{
        $sql= "DELETE * FROM $this->tableName WHERE login=?";
    }

    public function insert(array $user):bool{
        extract($user);
        $sql= "INSERT INTO $this->tableName 
        (nom,login,password,role,avatar)
        VALUES 
        (?,?,?,?,?)";
        $result=$this->persit($sql,[$nom,$login,$password,$role,$avatar]);
        return $result["count"]==0?false:true;
    }
     public function updateUser(int $id,$data):bool{
         extract($data);
        $sql= "UPDATE `$this->tableName` SET `login` =?, nom=?,
        WHERE `id` =$id";
        $result=$this->persit($sql,[$login,$nom]);
        return $result["count"]==0?false:true;
    }
    


}