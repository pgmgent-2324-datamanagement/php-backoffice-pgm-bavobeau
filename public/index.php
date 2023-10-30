<?php
require_once '../app.php';
include_once "$dir/partial/header.php";

?>

<h1>Dashboard</h1>

<h2>Bannen</h2>
<ul class="bannen" id="bannen">
<?php
$bannen = getBannen();
foreach($bannen as $ban) {
  include "$dir/views/bannen/input.php";
}
?>
</ul>

<h2>Rollen</h2>
<ul class="rollen">
<?php
$roles = getRoles();
foreach($roles as $rol) {
  echo "<li id=role_$rol->id>$rol->name</li>";
}
?>
</ul>

<?php

include_once "$dir/partial/footer.php";
