<?php
session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

$result = getCountFromUsers();

?>

<h1>Dashboard</h1>

<h2>Totaal aantal leden: <?= $result['count'] ?></h2>

<h2>leden per ban</h2>

<?php

include_once "$dir/partial/footer.php";
