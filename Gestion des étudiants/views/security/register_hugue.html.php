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
<?php if (Role::estAC() || Role::estRP() || Role::estAdmin() ) :?> 
<div class="container mt-5">
    <h1>Inscription</h1>
    <form action=" <?php path("security/register")?>" method="post" class="mt-5">
            <div class="mb-3 mt-5">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <label class="pl-5">
                    <input type="text" class="form-control" name="login">
                </label>
                <?php if (isset($array_error["login"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?= $array_error["login"]; ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <label class="pl-3">
                    <input type="password" class="form-control" name="password">
                </label>
                <?php if (isset($array_error["password"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?= $array_error["password"]; ?></div>
                <?php endif; ?>
            </div>
        <div class="row">
        <div class="col-md-5">
            <div class="mb-3">
                <label class="form-label pr-5">Avatar</label>
                <label class="pl-5">
                    <input type="file"  class="form-control" name="avatar" value="<?php
                    echo !isset($array_error["avatar"]) && isset($array_post["avatar"]) ? trim($array_post["avatar"]) : ''; ?>
                    ">
                </label>
                <?php if (isset($array_error["avatar"])) : ?>
                    <div class="form-text text-danger ">
                        <?= $array_error["avatar"]; ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php if (Role::estAdmin() || Role::estAC() || Role::estRP()) :?>
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <label class="form-label pr-5">Nom</label>
                    <label class="pl-5">
                        <input type="text" class="form-control" name="<?php
                        if(Role::estAC()){ echo 'nomEtu';} elseif(
                        Role::estRP()){ echo 'nomProf';}elseif (Role::estAdmin()){ echo 'nom';} ?>" value="<?php
                        echo !isset($array_error["nom"]) && isset($array_post["nom"]) ? trim($array_post["nom"]) : ''; ?>
                            ">
                    </label>
                    <?php if (isset($array_error["nom"])) : ?>
                    <div class="form-text text-danger ">
                        <?= $array_error["nom"]; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
    <?php if (Role::estAC() || Role::estRP()) :?>
            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label pr-5">Prénom</label>
                    <label>
                        <input type="text" class="form-control" name="<?php
                        if(Role::estAC()){ echo 'prenomEtu';} elseif(
                        Role::estRP()){ echo 'prenomProf';} ?>">
                    </label>
                    <?php if (isset($array_error["prenom"])) : ?>
                    <div class="form-text text-danger ">
                        <?= $array_error["prenom"]; ?></div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <div class="row">
        <div class="mb-3">
            <label class="form-label pl-3">Date de naissance</label>
            <label>
                <input type="date" class="form-control" name="<?php
                if(Role::estAC()){ echo 'dateNaissanceEtu';} elseif(
                Role::estRP()){ echo 'dateNaissanceProf';} ?>" required>
            </label>
            <?php if (isset($array_error["dateNaiss"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?= $array_error["dateNaiss"]; ?></div>
            <?php endif; ?>
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
            <?php if (isset($array_error["sexe"])) : ?>
            <div class="form-text text-danger ">
                <?= $array_error["sexe"]; ?></div>
            <?php endif; ?>
            </div>
        </div>
            <?php endif; ?>
    <?php if (Role::estAdmin() || Role::estAC() || Role::estRP()) :?>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="pr-5">Role</label>
                    <label class="pl-4">
                        <select class="form-control" name="role" id="">
                            <?php endif; ?>
                            <?php if (Role::estAdmin()) : ?>
                                <option value="ROLE_AC">ASSISTANT DE CLASSE</option>

                                <option value="ROLE_RP ">RESPONSABLE PEDAGOGIQUEP</option>
                            <?php endif; ?>
                            <?php if (Role::estAC()) :?>
                                <option value="ROLE_ET">ETUDIANT</option>
                            <?php endif; ?>
                            <?php if (Role::estRP()) :?>
                                <option value="ROLE_PROF">PROFESSEUR</option>
                            <?php endif; ?>
                        </select>
                    </label>
                </div>
            </div>
        </div>
<?php if (Role::estAC() || Role::estRP()) :?>
        <div class="mb-3">
            <label class="form-label pr-3"><?php
                if(Role::estAC()){ echo 'Classe';} elseif(
                Role::estRP()){ echo 'Classes';} ?></label>
            <label class="pl-5">
                <input type="text" class="form-control" name="<?php
                if(Role::estAC()){ echo 'ClasseEtu';} elseif(
                Role::estRP()){ echo 'ClasseProf';} ?>">
            </label>
            <?php if (isset($array_error["classe"])) : ?>
                <div class="form-text text-danger ">
                    <?= $array_error["classe"]; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label pr-3"><?php if(Role::estAC()){ echo 'Ses Competences';} elseif(
                Role::estRP()){ echo 'Ses Modules';} ?></label>
            <label class="pl-5">
                <input type="text" class="form-control" name="<?php if( Role::estAC()){ echo 'competenceEtu';} elseif(
                Role::estRP()){ echo 'moduleProf';} ?>">
            </label>
            <?php if (isset($array_error["Cp"])) : ?>
                <div class="form-text text-danger ">
                    <?= $array_error["Cp"]; ?></div>
            <?php endif; ?>
    </div>
    <?php endif; ?>
        <?php if (Role::estRP()) :?>
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
        <?php endif; ?>
             <?php if (Role::estAC()) :?>
                 <div class="row">
                     <div class="mb-3">
                         <label class="form-label pl-3">Parcours </label>
                         <label>
                             <input type="text" class="form-control" name="parcoursEtu" required>
                         </label>
                         <?php if (isset($array_error["parcoursEtu"])) : ?>
                             <div id="emailHelp" class="form-text text-danger ">
                                 <?= $array_error["parcoursEtu"]; ?></div>
                         <?php endif; ?>
                     </div>
                 </div>
            <div class="row">
                <div class="mb-3">
                    <label class="form-label pl-3">Annee scolaire en cours </label>
                    <label>
                        <input type="date" class="form-control" name="anneeSColaire" required>
                    </label>
                    <?php if (isset($array_error["anneeScolaire"])) : ?>
                        <div id="emailHelp" class="form-text text-danger ">
                            <?= $array_error["anneeScolaire"]; ?></div>
                    <?php endif; ?>
                </div>
            </div>
             <?php endif; ?>
        <div class="row">
            <div class="col-md-7">
            </div>
                <div class="pl-5">
            <button type="submit" class="btn btn-outline-primary">Inscription</button>
                </div>
                </div>

    </form>

</div>
<?php endif; ?> 