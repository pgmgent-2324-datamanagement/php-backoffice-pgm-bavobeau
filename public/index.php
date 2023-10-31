<?php
session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

?>

<h1>Dashboard</h1>


<?php

include_once "$dir/partial/footer.php";
