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
      <li><a href="<?= site_url('Kurs')?>"class="<?= ($this->uri->segment(1)=="Kurs") ? "active" : ""?>">Kursy</a></li>
      <?php if ($this->session->is_logged): ?>
        <li><a href="<?= site_url('Egzamin')?>"class="<?= ($this->uri->segment(1)=="Egzamin") ? "active" : ""?>">Egzaminy</a></li>
      <?php endif; ?>
      <li><a href="<?= site_url('Ranking')?>"class="<?= ($this->uri->segment(1)=="Ranking") ? "active" : ""?>">Ranking</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?= site_url('Opis')?>"class="<?= ($this->uri->segment(1)=="O projekcie") ? "active" : ""?>">O projekcie</a></li>
      <?php if (!$this->session->is_logged): ?>
        <li><a href="<?= site_url('Register')?>" class="<?= ($this->uri->segment(1)=="Register") ? "active" : ""?>">Zarejestruj się!</a></li>
        <li><a href="<?= site_url('Login')?>" class="<?= ($this->uri->segment(1)=="Login") ? "active" : ""?>">Zaloguj się!</a></li>
      <?php else: ?>
            <li>
              <form class="logout_form" method="post">
                <input class="logout" type="submit" value="Wyloguj">
              </form>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    </ul>
  </div>
</nav>
