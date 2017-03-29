<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });
    </script>
</head>
<body>
	<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Zarejestruj się!</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
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
						<div class="login-register">
				            <a href="<?= base_url() ?>" class="center">Powrót do strony głównej</a>
				         </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>
	<script type="text/javascript">
	
	</script>
</body>
</html>