<?php
require_once '../app.php';
include_once "$dir/partial/header.php";

?>

<h1>Articles</h1>
<form>
    <div class="mb-3">
        <label for="search" class="form-label">Search</label>
        <input type="text" class="form-control" name="search" id="search">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
