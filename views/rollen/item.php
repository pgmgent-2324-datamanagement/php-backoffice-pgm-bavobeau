<form method="POST row">
  <input type="hidden" name="id" value="<?= $role->id ?>">
  <input type="text" class="form-control col" name="name" value="<?= $role->name ?>">
  <div class="input-group-append col">
    <button class="btn btn-primary" name="edit_role" type="submit">Bewerken</button>
    <button class="btn btn-danger" name="delete_role" type="submit">Verwijderen</button>
  </div>
</form>