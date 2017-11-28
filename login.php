<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/validate.js"></script>
	<script>
	$(document).ready(function(){

		$("#username").val('');
		$("#password").val('');
		
		$("#username").after('<span id="id_username"></span>');
		$("#password").after('<span id="id_password"></span>');

		$("#id_username").hide();
		$("#id_password").hide();

		

		
	$("#username").blur(function () {
			
			var uname = $("#username").val();
			if (uname == '') {
			$("#id_username").show();	
			$("#id_username").addClass("error");
			$("#id_username").html("Cannot be empty");
			}
			else{
				$("#id_username").hide();
			}
			
			
		});


		$("#password").blur(function () {
		var pwd = $("#password").val();
		if (pwd == '') {
			$("#id_password").show();
			$("#id_password").addClass("error");
			$("#id_password").html("Cannot be empty");
		}
		else{
			$("#id_password").hide();
		}
		
	});


	});
	</script>
	<style>
	 .error {
	padding: 0px 2px;
	background: #fcc;
	border: 2px solid #c99;
	}



	</style>
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" id="username" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" id="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>