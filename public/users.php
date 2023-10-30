<?php
require_once '../app.php';
include_once "$dir/partial/header.php";

if(isset($_POST['add'])) {
  $firstname = $_POST['firstname'];
  $lastname = ($_POST['lastname'] ? $_POST['lastname'] : null);
  $email = ($_POST['email'] ? $_POST['email'] : null);
  $birthdate = ($_POST['birthdate'] ? $_POST['birthdate'] : null);
  $ban_id = $_POST['ban_id'];

  addUser($firstname, $lastname, $email, $birthdate, $ban_id);
}

if(isset($_POST['edit'])) {
  $id = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = ($_POST['lastname'] ? $_POST['lastname'] : null);
  $email = ($_POST['email'] ? $_POST['email'] : null);
  $birthdate = $_POST['birthdate'];
  $ban_id = $_POST['ban_id'];

  editUser($id, $firstname, $lastname, $email, $birthdate, $ban_id);
}

if(isset($_POST['delete'])) {
  $id = $_POST['id'];

  deleteUser($id);
}

?>

<h1>Dashboard</h1>

<h2>Nieuw lid</h2>

  <form class="user" method="POST">
    <input type="text" name="firstname" placeholder="firstname">
    <input type="text" name="lastname" placeholder="lastname">
    <input type="email" name="email" placeholder="email">
    <input type="date" name="birthdate" placeholder="birthdate">
    <select type="options" name="ban_id">
      <?=
      $bannen = getBannen();
      foreach($bannen as $ban) {
        echo "<option value=$ban->id>$ban->name</option>";
      }
      ?>
    </select>
    <button name="add" type="submit">Toevoegen</button>
  </form>

<h2>Leden</h2>
<ul>
<?php
  $users = getUsers();
  foreach($users as $user) {
    include "$dir/views/users/user.php";
  }
?>
</ul>

<?php

include_once "$dir/partial/footer.php";
