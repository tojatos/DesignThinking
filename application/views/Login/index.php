<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (!$this->session->is_logged): ?>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Logowanie</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2
							col-sm-8 col-sm-offset-2 col-sx-8 col-sx-offset-1">
          <form class="login_form" method="post">
						<div class="form-group">
              <label for="login" class="cols-sm-2 control-label">Login</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="login" id="login"  placeholder="Wpisz login"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Hasło</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Wpisz hasło"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<div><input class="btn btn-primary btn-lg btn-block login-button" type="submit" value="Zaloguj"></div>
						</div>
            </form>
				            <a href="<?= site_url('ForgottenPassword') ?>" class="center">Nie pamiętam hasła</a>
				</div>
			</div>
		</div>
<?php
  else:
    header('Location: '.base_url());
  endif;
