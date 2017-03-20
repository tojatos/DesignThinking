<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<a href="<?= site_url() ?>">Strona główna</a>
<?php if (!$this->session->isLogged): ?>
  <a href="<?= site_url('Register') ?>">Zarejestruj się</a>
  <a href="<?= site_url('Login') ?>">Zaloguj się</a>
<?php else: ?>
  <form class="logout_form" method="post">
    <input type="submit" value="Wyloguj się">
  </form>
<?php endif; ?>
