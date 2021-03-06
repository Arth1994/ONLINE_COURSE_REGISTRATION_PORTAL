<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create user!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/validate.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/weblysleek-ui-fonts.css">
	<link rel="stylesheet" href="css/main.css">
	<script>
	$(document).ready(function(){

		$.ajax({
                                    async: false,
                                    type: "GET",
                                    url: "handleDropdown.php",
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
			if (pwd.length >= 8) {
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
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
          aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">
          <img src="images/utd.png" alt="">
          <span class="text--bold">Admin - Create User</span>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="index.html">home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li>
            <a href="about.html">about</a>
          </li>
          <li>
            <a href="login.php">login</a>
          </li>
          <li>
            <a href="register.php">register</a>
          </li>
          
          <li>
            <a href="contact.html">contact us</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>	

<section id="home" class="section jumbotron-fluid bg--position-center no-repeat bg-cover md-display-table" >
<div class="container">
	<form class="form-group" method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div >
			<label>Username</label>
			<input class="form-control" type="text" name="username" id="username" >
		</div>
		<div>
			<label>Email</label>
			<input  class="form-control"type="email" name="email" id="email" >
		</div>
		<div>
			<label>User type</label>
			<select class="form-control" name="user_type" id="user_type" >
				<option value="None">None</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div>
			<label>Password</label>
			<input class="form-control" type="password" name="password_1" id="password">
		</div>
		<div >
			<label>Confirm password</label>
			<input class="form-control" type="password" name="password_2" id="password2">
		</div>
		<div >
		<label>SID</label>
		<select class="form-control" id="selectSID" name="selectSID">
		<option selected>None</option>
		</select>

		<div >
			<label>Image Name</label>
			<input class="form-control" type="text" name="imagename" id=imagename" >
		</div>
		</div>
		<br/>
		<div>
			<button type="submit" class="btn btn-primary" name="register_btn"> + Create user</button>
		</div>
	</form>
	</div>
</section>
 <!-- FOOTER -->
 <footer class="navbar navbar-fixed-bottom">
    <section class="footer footer-bottom">
      <div class="container">
        <hr/>
        <div class="row">
          <div class="col-md-5">
            <p class="copyright">Copyright © 2017 UTD COURSE REGISTRATION</p>
          </div>
          <div class="col-md-2">
            <a id="scroll-top-div" href="" class="pull-right back-top-btn">back to top
              <span class="btn-icon">
                <i class="ion-ios-arrow-thin-up"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
</footer>


	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>