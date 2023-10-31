<form class="list-group" method="POST">
    <a href="user_detail.php?id=<?= $user->id ?>" 
    class="list-group-item list-group-item-action">
    <?= $user->firstname . " " . $user->lastname ?>
    </a>
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <button class="btn btn-danger" name="delete" type="submit">Verwijderen</button>
</form>