<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form class="change_password_form" method="post">
  <h2 class="center">Zmień hasło</h2>
  <input type="hidden" name="code" value="<?= $code ?>">
  <div class="input"><label>Nowe hasło:</label><input type="password" name="password" value="" placeholder=""></div>
  <div class="input"><input type="submit" value="Zmień hasło"></div>
</form>
<a href="<?= base_url() ?>" class="center">Powrót do strony głównej</a>
