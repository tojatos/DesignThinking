<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?= site_url() ?>"><img src="<?= site_url() ?>public/images/logo.png" height="40px" width='200px'></a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-left">
      <li><a href="<?= site_url('Kurs')?>">Kursy</a></li>
      <?php if ($this->session->is_logged): ?>
        <li><a href="<?= site_url('Egzamin')?>">Egzaminy</a></li>
      <?php endif; ?>
      <li><a href="<?= site_url('Ranking')?>">Ranking</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if (!$this->session->is_logged): ?>
        <li><a href="<?= site_url('Register')?>">Zarejestruj się!</a></li>
        <li><a href="<?= site_url('Login')?>">Zaloguj się!</a></li>
      <?php else: ?>
        <span class="user_dropdown_toggle"><img src="" alt="Zdjęcie profilowe"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
        <div class="user_dropdown">
          <ul>
            <li><a href="<?= site_url('User') ?>">Mój profil</a></li>
            <li>
              <form class="PDF_form" method="post">
                <input type="submit" value="Ściągawka">
              </form>
            </li>
            <li>
              <form class="logout_form" method="post">
                <input type="submit" value="Wyloguj">
              </form>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    </ul>
  </div>
</nav>
