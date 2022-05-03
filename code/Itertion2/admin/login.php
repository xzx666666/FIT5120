<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign In To Admin</h3>
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="username" id="username" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" id="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="row form-sub m-0">

				</div>
				<div class="form-action mb-3">
					<a href="#" class="btn btn-primary btn-rounded btn-login" onclick="checkLogin();">Sign In</a>
				</div>

			</div>
		</div>

	</div>
	<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>
	<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.5.1/layer.js"></script>
</body>
</html>
<script type="text/javascript">
	function checkLogin(){
		var username=$("#username").val();
		var password=$("#password").val();
		$.post("../ajax.php?do=checkLogin",{username:username,password:password},function(res){
			if(res=="success"){
				location.href="index.php";
			}else{
				layer.msg("ERROR Incorrect username or password");
			}
		});
	}
</script>>