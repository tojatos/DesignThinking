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
        <a class="navbar-brand" href="<?= site_url() ?>"><img src="public/images/logo.jpg" height="40px" width='200px'></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <?php if ($this->session->isLogged): ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Panel ratownik <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">jakiś panel</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">jakiś inny panel</a></li>
                </ul>
            </li>
            <?php endif; ?>
        <?php if (!$this->session->isLogged): ?>
            <li><a href="<?= site_url('Register')?>">Zarejestruj się!</a></li>
            <li><a href="<?= site_url('Login')?>">Zaloguj się!</a></li>
        <?php else: ?>
            <form class="logout_form" method="post">
            <li><input type="submit" value="Wyloguj się"></li>
            </form>
        <?php endif; ?>
        </ul>
    </div>
</nav>


