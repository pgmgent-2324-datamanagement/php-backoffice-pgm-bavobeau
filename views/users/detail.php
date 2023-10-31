<form class="user" method="POST" id="user_<?= $user->id ?>">
  <div>
    <input type="hidden" name="id" value="<?= $user->id ?>">
  </div>
  <div class="mb-3">
    <label for="firstname" class="form-label">Firstname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user->firstname ?>" placeholder='firstname'>
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user->lastname ?>" placeholder='lastname'>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>" placeholder='email'>
  </div>
  <div class="mb-3">
    <label for="birtdate" class="form-label">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $user->birthdate ?>">
  </div>
  <select class="form-select" type="options" name="ban_id" value=<?= $user->ban_id ?>>
    <?=
    $bannen = getBannen();
    foreach($bannen as $ban) {
      echo "<option value='$ban->id' " . ($user->ban_id === $ban->id ? 'selected' : '' ) . ">$ban->name</option>";
    }
    ?>
  </select>
    <?php foreach($roles as $role) : 
      $is_selected = in_array($role->id, $user_roles) ? 'checked' : '';
      ?>
      <div class="form-check"><label class="form-check-label" for="<?= $role->id; ?>"><input class="form-check-input" type="checkbox" name="roles[]" id="<?= $role->id; ?>" value="<?= $role->id; ?>" <?= $is_selected ?>><?= $role->name; ?></label></div>
    <?php endforeach; ?>
  <button name="edit" type="submit">Submit</button>
  <button name="delete" type="submit">Delete</button>
</form>