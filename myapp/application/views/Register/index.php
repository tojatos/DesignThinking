<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Rejestracja</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4
							col-sm-6 col-sm-offset-3 col-sx-8 col-sx-offset-4">
          <form class="register_form" method="post">
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
							<label for="email" class="cols-sm-2 control-label">Twój Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Wpisz Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="city" class="cols-sm-2 control-label">Miasto</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="city" id="city"  placeholder="Wpisz miasto"/>
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

						<div class="form-group">
							<label for="password_repeat" class="cols-sm-2 control-label">Powtórz hasło</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password_repeat" id="password_repeat"  placeholder="Wpisz ponownie hasło"/>
								</div>
							</div>
						</div>
						<div class="form-group ">
							<div><input class="btn btn-primary btn-lg btn-block login-button" type="submit" value="Zarejestruj"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
