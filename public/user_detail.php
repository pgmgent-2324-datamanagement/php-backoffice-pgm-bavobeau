<?php
session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

$id = $_GET['id'] ?? 0;

$user = getUserById($id);
$roles = getRoles();
$user_roles = getRolesByUser($id) ? getRolesByUser($id) : [];
$bannen = getBannen();

if(isset($_POST['edit'])) {
  $id = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = ($_POST['lastname'] ? $_POST['lastname'] : null);
  $email = ($_POST['email'] ? $_POST['email'] : null);
  $birthdate = $_POST['birthdate'];
  $ban_id = $_POST['ban_id'];
  $roles = $_POST['roles'];

  updateUser($id, $firstname, $lastname, $email, $birthdate, $ban_id, $roles);
}

if(isset($_POST['delete'])) {
  $id = $_POST['id'];

  deleteUser($id);
}

?>

<h1>More options for <?= $user->firstname ." ". $user->lastname ?></h1>

<?= 
  include "$dir/views/users/detail.php";
?>

<?php
include_once "$dir/partial/footer.php";
