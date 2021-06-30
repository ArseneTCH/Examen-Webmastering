<?php
namespace ism\models;
use ism\lib\AbstractModel;
class AbsenceModel extends AbstractModel{

    public function __construct() {
        parent::__construct();
        $this->tableName = "absence";
        $this->primaryKey = "idAbsence";
    }

    public function getAbsenceByMatricule($matricule):array{
        $sql = "SELECT * FROM absence 
        WHERE etudiantMatricule=?";
        $result = $this->selectBy($sql, [$matricule], true);
        return $result["count"] == 0 ? [] : $result["data"];
    }

    public function insertAbsence($absence){
        extract($absence);
        $sql = "INSERT INTO absence 
        (dateAbsence,etudiantMatricule,coursId)
        VALUES 
        (?,?,?)";
        $result = $this->persit($sql, [$date, $matricule, $coursId]);
        return $result["count"] == 0 ? false : true;
    }

    public function getAbsence(): array
    {
        $sql = "SELECT * FROM absence";
        $result = $this->selectAll();
        return $result["count"] == 0 ? [] : $result["data"];
    }

   
    public function selectAbsenceByCours($coursId):array{
        $sql = "SELECT * FROM $this->tableName,cours
        WHERE coursId=idCours";
        $result = $this->selectBy($sql, [$coursId], true);
        return $result["count"] == 0 ? [] : $result["data"];
    }
    public function selectAbsenceBySemestre(string $semestreCours): array
    {
        $sql = "SELECT * FROM $this->tableName, cours WHERE coursId=idCours AND semestre=?";
        $result = $this->selectBy($sql,[$semestreCours],true);
        return $result["count"] == 0 ? [] : $result["data"];
    }
    
}