<?php

use ism\lib\Role;
use ism\lib\Session; ?>
<div class="navbar navbar-light bg-light">
 
    <a class="navbar-brand">
    <?php if (Role::estConnect()) :?>
      <div class="nav-item container-fluid">
      <img src="https://source.unsplash.com/1080x720/?product" alt="" width="50" height="50" class="d-inline-block align-text-top rounded">
       <?php /* if (Role::estEt()): Session::getSession("user_connect")["nom"]; endif;
       if (Role::estProf()): Session::getSession("user_connect")["nomProf"]; endif; 
       if (Role::estAdmin()|| Role::estAC() || Role::estRP()): Session::getSession("user_connect")["nom"];endif; */ 
       Session::getSession("user_connect")["nom"] ?> 
      </div>
    <?php endif ?>
    </a>
    <form class="d-flex">
      <button class="btn" type="submit">
      <?php if (!Role::estConnect()) : ?>
        <a class="bnt btn-success" href="<?php path('security/login') ?>">Connexion</a>
      <?php endif ?>
      <?php if (Role::estConnect()) : ?>
        <a class="btn btn-danger" href="<?php path('security/logout') ?>">Deconnexion</a>
      <?php endif ?>
      </button>
    </form>
  </div>
</nav>