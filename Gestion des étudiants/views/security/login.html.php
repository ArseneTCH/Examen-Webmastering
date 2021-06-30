<?php
use ism\lib\Session;
use ism\config\helper;

//verification des erreur de session
$array_error = [];
if (Session::keyExist("array_error")) {
    //recuperation des erreur de la session dans la variable local

    $array_error = Session::getSession("array_error");
    //dd($array_error);
    //suppression des erreur dans la session

    Session::destroyKey("array_error");
}
?>

<!-- <div class="container mt-5 ">
    <h2>Sign In </h2>
    <?php //if (isset($array_error["error_login"])) :?>
    <div class="alert alert-danger my-2 " role="alert">
        <strong><?//= $array_error["error_login"] ?></strong>
    </div>
    <?php //endif ?>
    <form action=" <?php //path("security/login") ?>"  method="post">
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
            <div class="col-md-3">
            </div>
            <div class="pl-1">
                <button type="submit" class="btn btn-outline-primary"><h3>Sign</h3></button>
            </div>
        </div>
    </form>
</div> -->
<div class="text-center px-5 py-4 ">
<main class="form-group">
    <?php if (isset($array_error["error_login"])) :?>
    <div class="alert alert-danger my-2 " role="alert">
        <strong><?= $array_error["error_login"] ?></strong>
    </div>
    <?php endif ?>
  <form action=" <?php path("security/login") ?>"  method="post">
    <img class="mb-4" src="https://source.unsplash.com/1080x720/?product" alt="" width="72" height="57">
    
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="login" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
      <?php if (isset($array_error["login"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?= $array_error["login"]; ?></div>
            <?php endif; ?>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
       <?php if (isset($array_error["password"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?= $array_error["password"]; ?></div>
            <?php endif; ?>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
  </form>
</main>
</div>