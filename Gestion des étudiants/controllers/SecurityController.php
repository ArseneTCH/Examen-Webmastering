<?php

namespace ism\controllers;
use \ism\lib\Role;
use \ism\lib\Request;
use \ism\lib\Session;
use \ism\lib\Response;
use \ism\models\UserModel;
use \ism\lib\PasswordEncoder;
use ism\models\EtudiantModel;
use ism\models\ProfesseurModel;
use \ism\lib\AbstractController;

/**
 * Undocumented class 
 */
class SecurityController extends AbstractController{
public function login(Request $request){
    if($request->isPost()){

        //dd($this->validator->getErrors());
        $data= $request->getBody();
    if(!$this->validator->estVide($data["login"], "login")){
        $this->validator->estMail($data["login"], "login");
    }
    $this->validator->estVide($data["password"], "password");
    if($this->validator->formValide()){
        // login et mot de passe correct
       
        $model_pr= new ProfesseurModel;
        $user_pr = $model_pr->selectUserByLoginPassword($data["login"]);
        $model_et= new EtudiantModel;
        $user_et = $model_et->selectUserByLoginPassword($data["login"]);
        $model= new UserModel;
        $user_us = $model->selectUserByLoginPassword($data["login"]);
        $user=$user_pr.$user_et.$user_us;

        if(empty($user)){
           $this->validator->setErrors("error_login","login ou mot de passe incorrect");
          Session::setSession("array_error",$this->validator->getErrors());
          //dd($user);
           Response::redirectUrl("security/login");
        }else{
            // login et password correct et existe
           // set_session("user_connect",$user);
            Session::setSession("user_connect",$user);
            if(PasswordEncoder::decode($data["password"],$user["password"])){
                
                if(Session::keyExist("action") && Session::getSession("action")== "etudiant"){
                    //Response::redirectUrl("reservation/addReservation");
                    $this->render("user/etudiant");
                }
                if($user["role"]=="ROLE_ADMIN"){
                    //Response::redirectUrl("user/admin");
                    $this->render("user/admin");
                }
                elseif($user["role"]=="ROLE_AC"){
                    //redirect_url("accueil.visiteur");
                   $this->render("user/ac");
                   
                }elseif($user["role"]=="ROLE_ET"){
                    //redirect_url("accueil.visiteur");
                   $this->render("user/etudiant");
                   
                }elseif($user["role"]=="ROLE_PR"){
                    //redirect_url("accueil.visiteur");
                   $this->render("user/prof");
                   
                }elseif($user["role"]=="ROLE_RP"){
                    //redirect_url("accueil.visiteur");
                   $this->render("user/rp");
                   
                }
            }else{
                $this->validator->setErrors("error_login","login ou mot de passe incorrect");
                Session::setSession("array_error",$this->validator->getErrors());
                Response::redirectUrl("security/login");
            }
        }
    }else {
        //Erreur de validation donc redirection vers page de connexion
        //dd($this->validator->getErrors());
        Session::SetSession("array_error",$this->validator->getErrors());
        Response::redirectUrl("security/login");
    }
    }
    $this->render("security/login");
}

public function register(Request $request){
    if($request->isPost()){
        $model= new UserModel();
        $model_pr= new ProfesseurModel();
        $model_et= new EtudiantModel();
        $data=$request->getBody();
        $this->validator->estVide($data["nom"], "nom");
        if(!$this->validator->estVide($data["login"], "login")){
            if($this->validator->estMail($data["login"], "login")){
                
                if($model->loginExiste($data["login"])||$model_pr->loginExistePr($data["login"])||$model_et->loginExisteEt($data["login"])){
                    $this->validator->setErrors("login","ce login existe deja dans le systeme");
                }
            }
        }
    
        $this->validator->estVide($data["password"], "password");
       if($this->validator->formValide()){
           $model= new UserModel();
           $data["password"]=PasswordEncoder::encode($data["password"]);
           $model->insert($data);
           Response::redirectUrl("security/login");
       }else{
        Session::SetSession("array_error",$this->validator->getErrors());
        Session::SetSession("array_post",$data);
        Response::redirectUrl("security/register");  
       }
    }
    $this->render("security/register");
    
}


public function registerEtu(Request $request){
    if($request->isPost()){
        $model= new UserModel();
        $model_pr= new ProfesseurModel();
        $model_et= new EtudiantModel();
        $data=$request->getBody();
        $this->validator->estVide($data["matriculeEtu"], "matriculeEtu");
        $this->validator->estVide($data["nomEtu"], "nomEtu");
        $this->validator->estVide($data["prenomEtu"], "prenomEtu");
        $this->validator->estVide($data["dateNaissanceEtu"], "dateNaissanceEtu");
        $this->validator->estVide($data["sexe"], "sexe");
        $this->validator->estVide($data["classeEtu"], "classeEtu");
        $this->validator->estVide($data["parcoursEtu"], "parcoursEtu");
        $this->validator->estVide($data["competanceEtu"], "competanceEtu");
        if(!$this->validator->estVide($data["login"], "login")){
            if($this->validator->estMail($data["login"], "login")){
                
                if($model->loginExiste($data["login"])||$model_pr->loginExistePr($data["login"])||$model_et->loginExisteEt($data["login"])){
                    $this->validator->setErrors("login","ce login existe deja dans le systeme");
                }
            }
        }
    
        $this->validator->estVide($data["password"], "password");
       if($this->validator->formValide()){
           $model= new EtudiantModel();
            $data["password"]=PasswordEncoder::encode($data["password"]);
           $model->insertEtu($data);
           Response::redirectUrl("security/login");
       }else{
        Session::SetSession("array_error",$this->validator->getErrors());
        Session::SetSession("array_post",$data);
        Response::redirectUrl("security/register");  
       }
    }
    $this->render("security/register");
    
}



public function registerProf(Request $request){
    if($request->isPost()){
        $model= new UserModel();
        $model_pr= new ProfesseurModel();
        $model_et= new EtudiantModel();
        $data=$request->getBody();
        $this->validator->estVide($data["matriculeProf"], "matriculeProf");
        $this->validator->estVide($data["nomProf"], "nomProf");
        $this->validator->estVide($data["prenomProf"], "prenomProf");
        $this->validator->estVide($data["dateNaissanceProf"], "dateNaissanceProf");
        $this->validator->estVide($data["sexe"], "sexe");
        $this->validator->estVide($data["classeProf"], "classeProf");
        $this->validator->estVide($data["gradeProf"], "gradeProf");
        $this->validator->estVide($data["moduleProf"], "moduleProf");
        if(!$this->validator->estVide($data["login"], "login")){
            if($this->validator->estMail($data["login"], "login")){
                
                if($model->loginExiste($data["login"])||$model_pr->loginExistePr($data["login"])||$model_et->loginExisteEt($data["login"])){
                    $this->validator->setErrors("login","ce login existe deja dans le systeme");
                }
            }
        }
    
        $this->validator->estVide($data["password"], "password");
       if($this->validator->formValide()){
           $model= new ProfesseurModel();
            $data["password"]=PasswordEncoder::encode($data["password"]);
           $model->insertProf($data);
           Response::redirectUrl("security/login");
       }else{
        Session::SetSession("array_error",$this->validator->getErrors());
        Session::SetSession("array_post",$data);
        Response::redirectUrl("security/register");  
       }
    }
    $this->render("security/register");
    
}

public function logout(){
    Session::destroySession();
    Response::redirectUrl("security/login");
}

public function showUser(){
    if(!Role::estAdmin())Response::redirectUrl("user/admin");
    $model=new UserModel();
    $data=$model->selectAll();
    //dd($data);
    $this->render("security/show.user",["users"=> $data]);

}






}