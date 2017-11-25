<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create user!</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script>
	$(document).ready(function(){

		$.ajax({
                                    async: false,
                                    type: "GET",
                                    url: "../handleDropdown.php",
                                    data: { tablechoice: "logindetail"},
                                    dataType: "json",
                                    success: function (datarows) {
                                       
                                        for (var i in datarows) {
                                            var datarow = datarows[i];
                                            var coldata = datarow['SID'];
                                            $("#selectSID").append('<option>' + coldata + '</option>');

                                        }
                                       


                                    }

                                });

			$("#username").val('');
			$("#password").val('');
			$("#password2").val('');
			$("#email").val('');

			$("#username").after('<span id="id_username"></span>');
			$("#password").after('<span id="id_password"></span>');
			$("#password2").after('<span id="id_password2"></span>');
			$("#email").after('<span id="id_email"></span>');
			$("#user_type").after('<span id="id_user_type"></span>');

			$("#id_username").hide();
			$("#id_password").hide();
			$("#id_password2").hide();
			$("#id_email").hide();
			$("#id_user_type").hide();
			
			
			
		$("#username").focus(function () {
		$("#id_username").html("Only Alpha-Numeric characters.");
		$("#id_username").removeClass("ok");
		$("#id_username").removeClass("error");
		$("#id_username").addClass("info");
		$("#id_username").show();
	});

	$("#password").focus(function () {
		$("#id_password").html("Must be atleast 8 characters.");
		$("#id_password").removeClass("ok");
		$("#id_password").removeClass("error");
		$("#id_password").addClass("info");
		$("#id_password").show();
	});

	$("#password2").focus(function () {
		$("#id_password2").html("Must match the entered password.");
		$("#id_password2").removeClass("ok");
		$("#id_password2").removeClass("error");
		$("#id_password2").addClass("info");
		$("#id_password2").show();
	});

	$("#email").focus(function () {
		$("#id_email").html(" Must be a valid email.");
		$("#id_email").removeClass("ok");
		$("#id_email").removeClass("error");
		$("#id_email").addClass("info");
		$("#id_email").show();
	});

	$("#user_type").focus(function () {
		$("#id_user_type").html(" User role can be Admin/User.");
		$("#id_user_type").removeClass("ok");
		$("#id_user_type").removeClass("error");
		$("#id_user_type").addClass("info");
		$("#id_user_type").show();
	});
			
			
			$("#username").blur(function () {
			var regx = /^[a-zA-Z0-9]+$/;
			var uname = $("#username").val();
			if (uname == '') {
				$("#id_username").hide();
			}
			else {
				if (regx.test(uname)) {
				//	$("#id_username").show();
					$("#id_username").removeClass("error");
					$("#id_username").removeClass("info");
					$("#id_username").addClass("ok");
					$("#id_username").html("OK");
				}
				else {
				//	$("#id_username").show();
					$("#id_username").removeClass("ok");
					$("#id_username").removeClass("info");
					$("#id_username").addClass("error");
					$("#id_username").html("ERROR : Invalid Username.");
				}
			}
		});

		$("#user_type").blur(function () {
			var utype = $("#user_type").val();
			if (utype == "None") {
			
					$("#id_user_type").removeClass("ok");
					$("#id_user_type").removeClass("info");
					$("#id_user_type").addClass("error");
					$("#id_user_type").html("ERROR : Must choose a role.");
			}
			else {
				
	
					$("#id_user_type").removeClass("error");
					$("#id_user_type").removeClass("info");
					$("#id_user_type").addClass("ok");
					$("#id_user_type").html("OK");
				
			}
		});


		$("#password").blur(function () {
		var pwd = $("#password").val();
		if (pwd == '') {
			$("#id_password").hide();
		}
		else {
			if (pwd.length > 8) {
			//	$("#id_password").show();
				$("#id_password").removeClass("error");
				$("#id_password").removeClass("info");
				$("#id_password").addClass("ok");
				$("#id_password").html("OK");
			}
			else {
			//	$("#id_password").show();
				$("#id_password").removeClass("ok");
				$("#id_password").removeClass("info");
				$("#id_password").addClass("error");
				$("#id_password").html("ERROR : Invalid Password.");
			}
		}
	});

	$("#password2").blur(function () {
		var pwd1 = $("#password").val();
		var pwd2 = $("#password2").val();
		if (pwd2 == '') {
			$("#id_password").hide();
		}
		else {
			if (pwd1==pwd2) {
			//	$("#id_password2").show();
				$("#id_password2").removeClass("error");
				$("#id_password2").removeClass("info");
				$("#id_password2").addClass("ok");
				$("#id_password2").html("OK");
			}
			else {
			//	$("#id_password2").show();
				$("#id_password2").removeClass("ok");
				$("#id_password2").removeClass("info");
				$("#id_password2").addClass("error");
				$("#id_password2").html("ERROR : Passwords do not match.");
			}
		}
	});

	$("#email").blur(function () {
		var regx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var mail = $("#email").val();
		if (mail == '') {
			$("#id_email").hide();
		}
		else {
			if (regx.test(mail)) {
			//	$("#id_email").show();
				$("#id_email").removeClass("error");
				$("#id_email").removeClass("info");
				$("#id_email").addClass("ok");
				$("#id_email").html("OK");
			}
			else {
			//	$("#id_email").show();
				$("#id_email").removeClass("ok");
				$("#id_email").removeClass("info");
				$("#id_email").addClass("error");
				$("#id_email").html("ERROR : Invalid Email Address");
			}
		}
	});

			
			

	

	});
	</script>
	
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}

		.ok, .info, .error {
	padding: 0px 2px;
}

.ok {
	background: #cfc;
	border: 2px solid #9c9;
}

.info {
	background: #ffc;
	border: 2px solid #cc9;
}

.error {
	background: #fcc;
	border: 2px solid #c99;
}
	</style>
	
</head>


<body>
	<div class="header">
		<h2>Admin - create user</h2>
	</div>
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" id="username" >
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" id="email" >
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value="None">None</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" id="password">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" id="password2">
		</div>
		<div class="input-group">
		<label>SID</label>
		<select id="selectSID" name="selectSID">
		<option selected>None</option>
		</select>

		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
</body>
</html>