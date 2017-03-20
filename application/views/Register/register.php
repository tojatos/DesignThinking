<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="register_form" method="post">
  <h2>Formularz rejestracji</h2>
  <div class="input"><label>E-mail:</label><input type="email" name="email" value="" placeholder="example@mail.com"></div>
  <div class="input"><label>Login:</label><input type="text" name="login" value="" placeholder="login"></div>
  <div class="input"><label>Hasło:</label><input type="password" name="password" value="" placeholder="password"></div>
  <div class="input"><label>Powtórz hasło:</label><input type="password" name="password_repeat" value="" placeholder="password"></div>
  <div class="input"><input type="submit" value="Zarejestruj"></div>
</form>
<a href="<?= base_url() ?>" class="center">Powrót do strony głównej</a>
