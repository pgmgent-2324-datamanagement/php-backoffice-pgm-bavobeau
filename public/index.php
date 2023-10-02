<?php
require_once '../app.php';
include_once "$dir/partial/header.php";

?>

<h1>Dashboard</h1>

<h2>Bannen</h2>
<form class="bannen" id="bannen">
<?php
$bannen = getBannen();
foreach($bannen as $ban) {
  include "$dir/views/bannen/input.php";
}
?>
<button type="submit">Submit</button>
</form>

<?php

include_once "$dir/partial/footer.php";
