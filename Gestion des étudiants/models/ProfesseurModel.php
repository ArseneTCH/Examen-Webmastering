<?php
namespace ism\models;
use ism\lib\FormatDate;
use ism\lib\AbstractModel;

class ProfesseurModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "professeur";
        $this->primaryKey = "id";
    }
    public function insertProf(array $user){
        extract($user);
        $sql = "INSERT INTO professeur
        (login,password,matriculeProf,nomProf,prenomProf,dateNaissanceProf,sexeProf,gradeProf,classeProf,
        moduleProf,role)
        VALUES 
        (?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->persit($sql, [$login,$password,$matricule, $nom, $prenom,FormatDate::createDateEn(), $sexe, $classe, $competence, $avatar, $parcours,$role]);
        return $result["count"] == 0 ? false : true;
    }
    public function loginExistePr(string $login):bool{
        $sql= "SELECT * FROM professeur WHERE login=:login";
        $result=$this->selectBy($sql,[':login'=>$login],true);
        return $result["count"]==0?false:true;
    }
     public function selectUserByLoginPassword(string $login):array{
        $sql= "SELECT * FROM professeur 
        WHERE login=?";
        $result=$this->selectBy($sql,[$login],true);
        return $result["count"]==0?[]:$result["data"];
    }
    
}