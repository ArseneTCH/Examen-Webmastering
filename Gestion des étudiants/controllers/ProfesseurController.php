<?php
namespace ism\controllers;

use ism\lib\Role;
use ism\lib\Request;
use ism\lib\Session;
use ism\lib\Response;
use ism\models\UserModel;
use ism\models\CoursModel;
use ism\lib\AbstractController;
use ism\models\ProfesseurModel;

class ProfesseurController extends AbstractController
{
    public function __construct()
    {

        parent::__construct();
        $this->model= new ProfesseurModel();
    }

    public function showCoursByProf(Request $request)
    {
        $model_cours =new CoursModel;
        if (!isset($request->getParams()[0])) {
            Response::redirectUrl("professeur/defaultPage");
        }
        $matriculeProf=$request->getParams()[0];
        $data = $model_cours->selectCoursByProf($matriculeProf);
        dd($data);
        $this->render("professeur/cours", ["professeur"=> $data]);
    }
    

    
}