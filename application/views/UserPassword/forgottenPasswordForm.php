<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (!$this->session->isLogged): ?>
<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Przywróć hasła</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2
							col-sm-8 col-sm-offset-2 col-sx-8 col-sx-offset-1">
          <form class="forgotten_password_form" method="post">
            <div class="input">
              <label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email"  placeholder="example@mail.com"/>
								</div>
							</div>
						</div>
            </br>

						<div class="form-group ">
							<div><input class="btn btn-primary btn-lg btn-block login-button" type="submit" value="Przywróć hasło"></div>
						</div>
            </form>
				            <a href="<?= base_url() ?>" class="center">Powrót do strony głównej</a>
				</div>
			
      </div></div>
<?php
  else:
    header('Location: '.base_url());
  endif;
