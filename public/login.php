<?php
session_start();

require_once '../app.php';
include_once "$dir/partial/header.php";

//deze hash kan opgehaald worden uit de database via de login 
//of uit de .env file als je bijvoorbeeld maar 1 gebruiker hebt
$correct_user = $_ENV['ADMIN_USER'];
$correct_pass_hash = $_ENV['ADMIN_PSW'];

$login = $_POST['login']  ?? '';
$password = $_POST['password'] ?? '';

//echo password_hash($password, PASSWORD_DEFAULT);

if($login && $password) {
    if($login == $correct_user && password_verify($password, $correct_pass_hash) ) {
        $_SESSION['person'] = $login;
        header('location: ./');
    } else {
        $_SESSION['person'] = null;
        echo 'incorrect password or username'; 
    }
}

$person = $_SESSION['person'] ?? '';

?>

<h1>Login</h1>

<form method="POST">
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="staticEmail" name="login" value="admin">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="password">
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php

include_once "$dir/partial/footer.php";
