<?php
session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

$bannen = getBannen();
$roles = getRoles();

if(isset($_POST['add'])) {
  $firstname = $_POST['firstname'];
  $lastname = ($_POST['lastname'] ? $_POST['lastname'] : null);
  $email = ($_POST['email'] ? $_POST['email'] : null);
  $birthdate = ($_POST['birthdate'] ? $_POST['birthdate'] : null);
  $ban_id = $_POST['ban_id'];
  $roles = $_POST['roles'];

  addUser($firstname, $lastname, $email, $birthdate, $ban_id, $roles);
}

if(isset($_POST['cancel'])) {
  header('Location: users.php');
}

?>

<h2>Nieuw lid toevoegen</h2>

<?php 
  include_once "$dir/views/users/user.php"
?>


<?php
include_once "$dir/partial/footer.php";