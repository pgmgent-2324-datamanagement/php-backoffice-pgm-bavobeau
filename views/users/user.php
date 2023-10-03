<li class="user">
  <form class="user" method="POST" id="user_<?= $user->id ?>">
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <input type="text" name="firstname" value="<?= $user->firstname ?>" placeholder='firstname'>
    <input type="text" name="lastname" value="<?= $user->lastname ?>" placeholder='lastname'>
    <input type="email" name="email" value="<?= $user->email ?>" placeholder='email'>
    <input type="date" name="birthdate" value="<?= $user->birthdate ?>">
    <select type="options" name="ban_id" value=<?= $user->ban_id ?>>
      <?=
      $bannen = getBannen();
      foreach($bannen as $ban) {
        echo "<option value='$ban->id' " . ($user->ban_id === $ban->id ? 'selected' : '' ) . ">$ban->name</option>";
      }
      ?>
    </select>
    <button type="submit">Submit</button>
  </form>
</li>