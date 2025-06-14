<?php
session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
  header('location: ./login.php');
}

require_once '../app.php';
include_once "$dir/partial/header.php";

$id = $_GET['id'] ?? 0;

$article = getArticleById($id);

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    updateArticle($id, $title, $content);
}

if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    deleteArticle($id);
}
?>

<h1>Edit article</h1>

<form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title"  value="<?= $article->title; ?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3"><?= $article->content; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $article->article_id; ?>">
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <button type="submit" name="delete" class="btn btn-secondary">Delete</button>
</form>


<?php
include_once "$dir/partial/footer.php";
