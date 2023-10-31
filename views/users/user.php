<form class="user" method="POST">
  <div class="mb-3">
    <label for="firstname" class="form-label">Voornaam</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="" placeholder='voornaam'>
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Achternaam</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="" placeholder='achternaam'>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="" placeholder='email'>
  </div>
  <div class="mb-3">
    <label for="birtdate" class="form-label">Geboortedatum</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" value="">
  </div>
  <label for="ban">Ban</label>
  <select class="form-select" type="options" name="ban_id" >
    <?php foreach($bannen as $ban) {
      echo "<option value='$ban->id'>$ban->name</option>";
    }
    ?>
  </select>
  <label for="roles" class="form-label">Rollen</label>
    <?php foreach($roles as $role) : ?>
      <div class="form-check"><label class="form-check-label" for="<?= $role->id; ?>"><input class="form-check-input" type="checkbox" name="roles[]" id="<?= $role->id; ?>" value="<?= $role->id; ?>"><?= $role->name; ?></label></div>
    <?php endforeach; ?>
  <button class="btn btn-success" name="add" type="submit">Toevoegen</button>
  <button class="btn btn-warning" name="cancel" type="submit">Annuleren</button>
</form>