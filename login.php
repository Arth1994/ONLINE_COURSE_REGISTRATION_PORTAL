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


		$("#submit").click(function(){

			//alert("Hi");
			var username 	= $("#username").val();
    		var password 	= $("#password").val();
			
			var letters = /^[a-zA-Z0-9]+$/;
			
			if((username == "") || (password == "")) 
			{
					alert("Missing Fields");
			}

		});

	});
	</script>
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