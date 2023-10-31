<?php
session_start();

if (!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

$bannen = getBannen();
$rollen = getRoles();

if (isset($_POST['add_role'])) {
  $name = $_POST['name'];

  addRole($name);
}

if (isset($_POST['edit_role'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];

  updateRole($id, $name);
}

if (isset($_POST['delete_role'])) {
  $id = $_POST['id'];

  deleteRole($id);
}

if (isset($_POST['add_ban'])) {
  $name = $_POST['name'];

  addBan($name);
}

if (isset($_POST['edit_ban'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];

  updateBan($id, $name);
}

if (isset($_POST['delete_ban'])) {
  $id = $_POST['id'];

  deleteBan($id);
}

?>

<h1>Bannen & rollen</h1>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Bannen</h2>

      <form method="POST" class="row mb-4">
        <input type="text" class="form-control col" name="name" placeholder="nieuwe ban">
        <div class="input-group-append col">
          <button class="btn btn-success" name="add_ban" type="submit">Toevoegen</button>
        </div>
      </form>

      <?php foreach ($bannen as $ban) {
        include "$dir/views/bannen/item.php";
      }
      ?>
    </div>

    <div class="col">
      <h2>Rollen</h2>

      <form method="POST" class="row mb-4">
        <input type="text" class="form-control col" name="name" placeholder="nieuwe rol">
        <div class="input-group-append col">
          <button class="btn btn-success" name="add_ban" type="submit">Toevoegen</button>
        </div>
      </form>
      <?php foreach ($rollen as $role) {
        include "$dir/views/rollen/item.php";
      }
      ?>
    </div>
  </div>
</div>
<?php

include_once "$dir/partial/footer.php";
