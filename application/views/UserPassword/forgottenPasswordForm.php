<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (!$this->session->isLogged): ?>
<form class="forgotten_password_form" method="post">
  <h2 class="center">Przypomnij hasło</h2>
  <div class="input"><label>E-mail:</label><input type="email" name="email" value="" placeholder="example@mail.com"></div>
  <div class="input"><input type="submit" value="Przypomnij hasło"></div>
</form>
<a href="<?= base_url() ?>" class="center">Powrót do strony głównej</a>
<?php
  else:
    header('Location: '.base_url());
  endif;
