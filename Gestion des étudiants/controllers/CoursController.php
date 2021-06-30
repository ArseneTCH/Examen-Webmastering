<?php
namespace ism\controllers;

use ism\lib\Role;
use ism\lib\Request;
use ism\lib\Session;
use ism\lib\Response;
use ism\models\CoursModel;
use ism\lib\AbstractController;

class CoursController extends AbstractController{

/*Un RP ou AC peut lister les cours d’un professeur*/
    public function __construct(){
        parent::__construct();
        $this->model= new CoursModel();
    }
    
    

    public function showCoursByEtu(Request $request){
        if(!isset($request->getParams()[0]) || !is_numeric($request->getParams()[0])){
            Response::redirectUrl("etudiants/defaultPage");
        }
     $matriculeProf=$request->getParams()[0];
     $data = $this->model->selectById($matriculeProf);
    $this->render("etudiants/cours",["etudiant"=> $data]);
    }
    public function showCoursByClasse(Request $request){
        if(!isset($request->getParams()[0]) || !is_numeric($request->getParams()[0])){
            Response::redirectUrl("rp/defaultPage");
        }
     $classeId=$request->getParams()[0];
     $data = $this->model->selectCoursByClasse($classeId);
    $this->render("rp/cours",["etudiant"=> $data]);
    }
    public function planifierCours(Request $request){
        if(!Role::estRP())Response::redirectUrl("user/rp");
        $idProf = Session::getSession("idProf");
        $idCours = Session::getSession("idCours");
        Session::destroyKey("IdProf");
        Session::destroyKey("IdCours");
        Session::destroyKey("action");
        $model =new CoursModel();
        $model->insertCours(["profId"=>$idProf,"coursId" => $idCours]);
        Response::redirectUrl("cours/showCours/");
    }


}