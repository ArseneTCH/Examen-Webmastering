<?php

use ism\lib\Session;
use ism\lib\Role;
//verification des erreur de session

$array_error = [];
if (Session::keyExist("array_error")){
    //recuperation des erreur de la session dans la variable local
    $array_error = Session::getSession("array_error");
    Session::destroyKey("array_error");    
}
?>
<!-- 
<?php //if (Role::estAC() || Role::estRP() || Role::estAdmin() ) :?> 
    <div class="container mt-5">
    <h1>Inscription</h1>
    <form action=" <?php //path("security/login")?>" method="post" class="mt-5">
    <?php //if (Role::estAC() || Role::estRP()) :?>
        <div class="mb-3">
            <label class="form-label pr-3">Matricule</label>
            <label class="pl-5">
                <input type="text" class="form-control" name="nom" value="">
            </label>
        </div>
    <?php //endif; ?>
    <?php //if (Role::estAdmin()) :?>
            <div class="mb-3 mt-5">
                <label for="exampleInputEmail1" class="form-label">Login </label>
                <label class="pl-5">
                    <input type="text" class="form-control" name="login">
                </label>
                <?php //if (isset($array_error["login"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?//= $array_error["login"]; ?></div>
                <?php //endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <label class="pl-3">
                    <input type="password" class="form-control" name="password">
                </label>
                <?php //if (isset($array_error["password"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?//= $array_error["password"]; ?></div>
                <?php //endif; ?>
            </div>
        <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label class="form-label pr-5">Avatar</label>
                <label class="pl-5">
                    <input type="file" class="form-control" name="avatar" value="<?php
                    //echo !isset($array_error["nom"]) && isset($array_post["avatar"]) ? trim($array_post["avatar"]) : ''; ?>
                            ">
                </label>
                <?php //if (isset($array_error["nom"])) : ?>
                    <div class="form-text text-danger ">
                        <?//= $array_error["nom"]; ?></div>
                <?php //endif; ?>
            </div>
        </div>
    <?php //endif; ?>
    <?php //if (Role::estAdmin() || Role::estAC() || Role::estRP()) :?>
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <label class="form-label pr-5">Nom</label>
                    <label class="pl-5">
                        <input type="text" class="form-control" name="nom" value="<?php
                        //echo !isset($array_error["nom"]) && isset($array_post["nom"]) ? trim($array_post["nom"]) : ''; ?>
                            ">
                    </label>
                    <?php //if (isset($array_error["nom"])) : ?>
                    <div class="form-text text-danger ">
                        <?//= $array_error["nom"]; ?></div>
                    <?php //endif; ?>
                </div>
            </div>
            <?php //endif; ?>
    <?php //if (Role::estAC() || Role::estRP()) :?>
            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label pr-5">Prénom</label>
                    <label>
                        <input type="text" class="form-control" name="prenom">
                    </label>
                    <?php //if (isset($array_error["prenom"])) : ?>
                    <div class="form-text text-danger ">
                        <?//= $array_error["prenom"]; ?></div>
                    <?php //endif; ?>
                </div>
            </div>

        </div>
        <div class="row">
        <div class="mb-3">
            <label class="form-label pl-3">Date de naissance</label>
            <label>
                <input type="text" class="form-control" name="dateNaiss">
            </label>
            <?php //if (isset($array_error["dateNaiss"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?//= $array_error["dateNaiss"]; ?></div>
            <?php //endif; ?>
            </div>
        </div>

        <div class="row">
        <div class="col-md-5">
        <div class="mb-3">
            <label class="form-label pr-5">Sexe</label>
            <label class="pr-5">
            <select class="form-control" name="sexe" id="">
                <option value="M">M</option>

                <option value="F">F</option>
            </select>
            </label>
            <?php //if (isset($array_error["sexe"])) : ?>
            <div class="form-text text-danger ">
                <?//= $array_error["sexe"]; ?></div>
            <?php //endif; ?>
            </div>
        </div>
            <?php //endif; ?>
    <?php //if (Role::estAdmin() || Role::estAC() || Role::estRP()) :?>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="pr-5">Role</label>
                    <label class="pl-4">
                        <select class="form-control" name="role" id="">
                            <?php //endif; ?>
                            <?php //if (Role::estAdmin()) : ?>
                                <option value="ROLE_AC">ASSISTANT DE CLASSE</option>

                                <option value="ROLE_RP ">RESPONSABLE PEDAGOGIQUEP</option>
                            <?php //endif; ?>
                            <?php //if (Role::estAC()) :?>
                                <option value="ROLE_ET">ETUDIANT</option>
                            <?php //endif; ?>
                            <?php //if (Role::estRP()) :?>
                                <option value="ROLE_ADMIN">PROFESSEUR</option>
                            <?php //endif; ?>
                        </select>
                    </label>
                </div>
            </div>
        </div>
    <?php //endif; ?>
    <?php //if (Role::estAC() || Role::estRP()) :?>
        <div class="mb-3">
            <label class="form-label pr-3"><?php
                //if(Role::estAC()){ echo 'Classe';} elseif(
                //Role::estRP()){ echo 'Classes';} ?></label>
            <label class="pl-5">
                <input type="text" class="form-control" name="classe">
            </label>
            <?php //if (isset($array_error["classe"])) : ?>
                <div class="form-text text-danger ">
                    <?//= $array_error["classe"]; ?></div>
            <?php //endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label pr-3"><?php //if(Role::estAC()){ echo 'Ses Competences';} elseif(
               // Role::estRP()){ echo 'Ses Modules';} ?></label>
            <label class="pl-5">
                <input type="text" class="form-control" name="<?php //if( Role::estAC()){ echo 'Competence';} elseif(
                //Role::estRP()){ echo 'Module';} ?>">
            </label>
            <?php //if (isset($array_error["Cp"])) : ?>
                <div class="form-text text-danger ">
                    <?//= $array_error["Cp"]; ?></div>
            <?php //endif; ?>
        </div>
    <?php //endif; ?>
    --------------------------------------------------------
        <?php //if (Role::estRP()) :?>
    <div class="mb-3">
        <div class="form-group">
            <label for="" class="pr-4">Grade</label>
            <label class="pl-3">
            <select class="form-control" name="grade" id="">
                    <option value="GRADE_ING">INGENIEUR</option>

                    <option value="GRADE_DOCTEUR ">DOCTEUR</option>
            </select>
            </label>
        </div>
    </div>
        <?php //endif; ?>
        <div class="row">
            <div class="col-md-7">
            </div>
                <div class="pl-5">
            <button type="submit" class="btn btn-outline-primary">Inscription</button>
                </div>
                </div>

    </form>

</div>
<?php //endif; ?> 

-->
 

<!--
<div class="container" style="margin-top: 5%;">
  <div class="row">
    <div class="col-sm-4"> </div>
<div class="col-md-4">
  
<h1 class="text-center text-success"> Register page</h1>
<br/>
<div class="col-sm-12">

<br/>

      


  
  <div class="form-group">
    <label for="email">Login:</label>
    <input type="email" class="form-control" id="email">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>

  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>



  <button type="submit" class="pull-right btn btn-block btn-lg btn-success">Submit</button>
</form>
<br/>
<a href="#" class="pull-right btn btn-block btn-danger" > Already Register ?   </a>
    </div>
<br/>
  </div>
</div>
</div> 




  <body class="bg-light">
    
<div class="container">
  <main>
    

    <div class="row g-5">
      
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <h1 class="text-center text-success"> Register page</h1>

        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

              <?php //if (Role::estAdmin() || Role::estAC() || Role::estRP()) :?>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="pr-5">Role</label>
                    <label class="pl-4">
                        <select class="form-control" name="role" id="">
                            <?php //endif; ?>
                            <?php //if (Role::estAdmin()) : ?>
                                <option value="ROLE_AC">ASSISTANT DE CLASSE</option>

                                <option value="ROLE_RP ">RESPONSABLE PEDAGOGIQUEP</option>
                            <?php //endif; ?>
                            <?php //if (Role::estAC()) :?>
                                <option value="ROLE_ET">ETUDIANT</option>
                            <?php //endif; ?>
                            <?php //if (Role::estRP()) :?>
                                <option value="ROLE_ADMIN">PROFESSEUR</option>
                            <?php //endif; ?>
                        </select>
                    </label>
                </div>
            </div>
        </div>
    <?php //endif; ?>

                <?php //if (Role::estAdmin()) :?>
            <div class="mb-3 mt-5">
                <label for="exampleInputEmail1" class="form-label">Login </label>
                <label class="pl-5">
                    <input type="text" class="form-control" name="login">
                </label>
                <?php //if (isset($array_error["login"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?//= $array_error["login"]; ?></div>
                <?php //endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <label class="pl-3">
                    <input type="password" class="form-control" name="password">
                </label>
                <?php //if (isset($array_error["password"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?//= $array_error["password"]; ?></div>
                <?php //endif; ?>
            </div>
        <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label class="form-label pr-5">Avatar</label>
                <label class="pl-5">
                    <input type="file" class="form-control" name="avatar" value="<?php
                    //echo !isset($array_error["nom"]) && isset($array_post["avatar"]) ? trim($array_post["avatar"]) : ''; ?>
                            ">
                </label>
                <?php //if (isset($array_error["nom"])) : ?>
                    <div class="form-text text-danger ">
                        <?//= $array_error["nom"]; ?></div>
                <?php //endif; ?>
            </div>
        </div>
    <?php //endif; ?>
    <?php //if (Role::estAC() || Role::estRP()) :?>
        <div class="mb-3">
            <label class="form-label pr-3"><?php
                //if(Role::estAC()){ echo 'Classe';} elseif(
                //Role::estRP()){ echo 'Classes';} ?></label>
            <label class="pl-5">
                <input type="text" class="form-control" name="classe">
            </label>
            <?php //if (isset($array_error["classe"])) : ?>
                <div class="form-text text-danger ">
                    <?//= $array_error["classe"]; ?></div>
            <?php //endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label pr-3"><?php //if(Role::estAC()){ echo 'Ses Competences';} elseif(
               // Role::estRP()){ echo 'Ses Modules';} ?></label>
            <label class="pl-5">
                <input type="text" class="form-control" name="<?php //if( Role::estAC()){ echo 'Competence';} elseif(
                //Role::estRP()){ echo 'Module';} ?>">
            </label>
            <?php //if (isset($array_error["Cp"])) : ?>
                <div class="form-text text-danger ">
                    <?//= $array_error["Cp"]; ?></div>
            <?php //endif; ?>
        </div>
    <?php //endif; ?>
        
              <button type="submit" class="pull-right btn btn-block btn-lg btn-success">Submit</button>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </main>


-->
     <div class="container mt-5">
      <h1 class="text-center text-success"> Register page</h1>

      <form action="<?php ROOT_CONTROLLERS.'/security.php' ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-sm-6">
                        <label  class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" value="<?php
                            echo !isset($array_error["nom"]) && isset($array_post["nom"])?trim($array_post["nom"]):'';?>
                        ">
                        <?php if(isset($array_error["nom"])):?>
                            <div  class="form-text text-danger ">
                            <?= $array_error["nom"]; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6" >
                    <label class="form-label pr-5">Avatar</label>
                    <label class="pl-5" size="10">
                        <input type="file" class="form-control" name="avatar" value="<?php
                        echo !isset($array_error["avatar"]) && isset($array_post["avatar"]) ? trim($array_post["avatar"]) : ''; ?>
                        ">
                    </label>
                    <?php if (isset($array_error["avatar"])) : ?>
                        <div class="form-text text-danger ">
                            <?= $array_error["avatar"]; ?></div>
                    <?php endif; ?>
                </div>
            
            </div>
            <div class="mb-3">
                <label  class="form-label">Email address</label>
                <input type="text" class="form-control" name="login">
                <?php if(isset($array_error["login"])):?>
                    <div id="emailHelp" class="form-text text-danger ">
                    <?= $array_error["login"]; ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control"name="password" >
                <?php if(isset($array_error["password"])):?>
                    <div  class="form-text text-danger ">
                    <?= $array_error["password"]; ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="">Role</label>
              <select class="form-control" name="role" id="">                
                <option value="ROLE_ADMIN">Administrator</option>
                <option value="ROLE_AC">Attaché de Classe</option>
                <option value="ROLE_RP">Responsable Pedagogique</option>
              </select>
            </div>
            <div class="row float-right">
                <button type="submit" class="pull-right btn btn-block btn-lg btn-success">Submit</button>
             </div> 
        </form>
      </div>
