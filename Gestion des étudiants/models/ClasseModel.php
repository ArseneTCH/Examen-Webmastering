<?php
namespace ism\models;
use ism\lib\AbstractModel;
class AbsenceModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "classe";
        $this->primaryKey = "id";
    }
    public function insert(array $user):bool{
        extract($user);
        $sql= "INSERT INTO $this->tableName 
        (libelleClass,niveauClass,filiereClass)
        VALUES 
        (?,?,?)";
        $result=$this->persit($sql,[$libelleClass,$niveauClass,$filiereClass]);
        return $result["count"]==0?false:true;
    }
    public function selectByClasse(string $niveauClass, string $filiereClass){
        $sql="SELECT * FROM $this->tableName WHERE niveauClass=? AND filiereClass=?";
        $result=$this->selectBy($sql,[$niveauClass,$filiereClass],true);
    }
    public function selectByNiveau(string $niveauClass){
        $sql="SELECT * FROM $this->tableName WHERE niveauClass=?";
        $result=$this->selectBy($sql,[$niveauClass],true);
    }
}