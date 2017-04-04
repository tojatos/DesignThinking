<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
        <a class="navbar-brand" href="<?= site_url() ?>"><img src="<?= site_url() ?>public/images/logo.png" height="40px" width='200px'></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-left">
                <li><a href="<?= site_url('Kurs')?>">Kursy</a></li>
            <?php if ($this->session->isLogged): ?>
                <li><a href="<?= site_url('Egzamin')?>">Egzaminy</a></li>
            <?php endif; ?>
                <li><a href="<?= site_url('Ranking')?>">Ranking</a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
        <?php if (!$this->session->isLogged): ?>
            <li><a href="<?= site_url('Register')?>">Zarejestruj się!</a></li>
            <li><a href="<?= site_url('Login')?>">Zaloguj się!</a></li>

    <!--<div id="navbar" class="navbar-collapse collapse"
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div>-->

        <?php else: ?>
            <form class="logout_form" method="post">
            <li><input type="submit" value="Wyloguj się"></li>
            </form>
        <?php endif; ?>
        </ul>
    </div>
</nav>
