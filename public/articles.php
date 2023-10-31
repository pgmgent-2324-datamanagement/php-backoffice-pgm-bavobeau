<?php
session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

?>

<h1>Articles</h1>

<form class="input-group mb-3">
  <input type="text" class="form-control" name="search" placeholder="Search" aria-label="search" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Search</button>
  </div>
</form>

<div class="list-group">
<?php
$search = $_GET['search'] ?? '';
$articles = getArticles($search);
foreach ($articles as $article) {
    include "$dir/views/articles/item.php";
}
?>
</div>

<?php
include_once "$dir/partial/footer.php";
