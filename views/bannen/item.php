<form method="POST">
  <input type="hidden" name="id" value="<?= $ban->id ?>">
  <input type="text" class="form-control" name="name" value="<?= $ban->name ?>">
  <div class="input-group-append">
    <button class="btn btn-primary" name="edit_ban" type="submit">Bewerken</button>
    <button class="btn btn-danger" name="delete_ban" type="submit">Verwijderen</button>
  </div>
</form>