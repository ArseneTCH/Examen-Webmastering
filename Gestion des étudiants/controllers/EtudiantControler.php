<?php
namespace ism\controllers;

use ism\lib\Role;
use ism\lib\Request;
use ism\lib\Session;
use ism\lib\Response;
use ism\models\UserModel;
use ism\models\CoursModel;
use ism\models\EtudiantModel;
use ism\lib\AbstractController;
use ism\models\ProfesseurModel;
use ism\models\RessourcesModel;

class EtudiantController extends AbstractController
{
    private EtudiantModel $model;
    public function __construct()
    {
        parent::__construct();
        $this->model= new EtudiantModel();
    }
    public function inscrirEtu()
    {
        if (!Role::estAC()) {
            Response::redirectUrl("security/login");
        }
        $matriculeEtu = Session::getSession("matriculeEtu");
        $classeEtu=Session::getSession("classeEtu");
        Session::destroyKey("matriculeEtu");
        Session::destroyKey("classeEtu");
        Session::destroyKey("action");
        $this->model->insertEtu(["matriculeEtu" => $matriculeEtu,"classeEtu" => $classeEtu]);
        Response::redirectUrl("user/showListeEtu/");
    }
    
}