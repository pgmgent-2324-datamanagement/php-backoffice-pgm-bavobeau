<?php
session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

$bannen = getBannen();

if(isset($_POST['add'])) {
  $firstname = $_POST['firstname'];
  $lastname = ($_POST['lastname'] ? $_POST['lastname'] : null);
  $email = ($_POST['email'] ? $_POST['email'] : null);
  $birthdate = ($_POST['birthdate'] ? $_POST['birthdate'] : null);
  $ban_id = $_POST['ban_id'];

  addUser($firstname, $lastname, $email, $birthdate, $ban_id);
}

if(isset($_POST['delete'])) {
  $id = $_POST['id'];

  deleteUser($id);
}

?>

<h1>Leden</h1>

<div class="input-group-append">
  <a href="add_user.php" class="btn btn-success" type="submit">Nieuw lid</a>
</div>

<h2>Zoek door leden</h2>
<form class="input-group mb-3">
  <input type="text" class="form-control" name="search" placeholder="Search" aria-label="search" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Search</button>
  </div>
</form>

<ul class="list-group">
<?php
$search = $_GET['search'] ?? '';
$users = getUsers($search);
  foreach($users as $user) {
    include "$dir/views/users/item.php";
  }
?>
</ul>

<?php

include_once "$dir/partial/footer.php";
