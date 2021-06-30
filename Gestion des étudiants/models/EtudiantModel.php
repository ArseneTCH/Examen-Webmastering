<?php
namespace ism\models;
use ism\lib\FormatDate;
use ism\lib\AbstractModel;

class EtudiantModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "etudiant";
        $this->primaryKey = "id";
    }
    public function loginExisteEt(string $login):bool{
        $sql= "SELECT * FROM etudiant WHERE login=:login";
        $result=$this->selectBy($sql,[':login'=>$login],true);
        return $result["count"]==0?false:true;
    }
        public function insertEtu(array $user){
        extract($user);
        $sql = "INSERT INTO etudiant 
        (login,password,matriculeEtu,nomEtu,prenomEtu,dateNaissanceEtu,sexeEtu,classeEtu,
        competenceEtu,parcoursEtu,role)
        VALUES 
        (?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->persit($sql, [$login,$password,$matricule,$nom,$prenom,FormatDate::createDateEn(),$sexe,$classe,$competence,$avatar,$parcours,$role]);
        return $result["count"] == 0 ? false : true;
    }
    public function showEtuByClasse(string $classe):array{
        $sql="SELECT * FROM $this->tableName WHERE classe=?";
        $result=$this->showEtuByClasse($sql,[$classe],true);
        return $result["count"]==0?[]:$result["data"];
    }

    public function updateEtu(array $user):bool{
        extract($user);
        $sql="UPDATE $this->tableName SET nomEtu=? WHERE matriculeEtu=? ";
        $result= $this->persit($sql,[$user],true);
        return $result["count"] == 0 ? true : false;

    }
     public function selectUserByLoginPassword(string $login):array{
        $sql= "SELECT * FROM etudiant 
        WHERE login=?";
        $result=$this->selectBy($sql,[$login],true);
        return $result["count"]==0?[]:$result["data"];
    }
    /* ------------------------------------------------------------------------------*/
    public function showCoursByEtu($coursId):array{
        $sql = "SELECT libelleCours FROM $this->tableName,cours
        WHERE coursId=idCours";
        $result = $this->selectBy($sql, [$coursId], true);
        return $result;
    }

}