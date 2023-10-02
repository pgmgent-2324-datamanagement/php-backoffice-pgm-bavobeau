<?php
require_once '../app.php';
include_once "$dir/partial/header.php";

?>

<h1>Dashboard</h1>

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
