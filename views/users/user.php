<li class="user">
  <form class="user" id="user_<?= $user->id ?>">
    <input type="text" id="firstname" placeholder="<?= $user->firstname ?>">
    <input type="text" id="lastname" placeholder="<?= $user->lastname ?>">
    <input type="text" id="email" placeholder="<?= $user->email ?>">
    <input type="date" id="birthdate" placeholder="<?= $user->birthdate ?>">
    <select type="options" id="ban_id" placeholder="<?= $user->ban_id ?>">
      <?=
      $bannen = getBannen();
      foreach($bannen as $ban) {
        echo "<option value=$ban->id>$ban->name</option>";
      }
      ?>
    </select>
    <button type="submit">Submit</button>
  </form>
</li>