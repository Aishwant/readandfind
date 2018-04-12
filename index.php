<?php
	include('included_functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Read And Find</title>

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/main.css" />

</head>
<body>

<section class="header">

</section>

<div class="left-img"></div>

<section class="content">

	<?php form_setup_start("Login Here","Welcome");

			if(isset($_POST['submit'])){
				if(isset($_POST['email_id']) && isset($_POST['pwd']) && !empty($_POST['email_id']) && !empty($_POST['pwd'])){
					if(isset($_POST['email_id']))
						$emailId = $_POST['email_id'];
				}else
					echo '<center><font class="alert-login">Please fill the required field</font></center>';
			}

	?>

		<div>
			<h6>Email ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email_id" value="" class="input-style"></h6><br><br>
			<h6>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" value="" class="input-style"></h6>
		</div><br /><br />

		<input name="submit" value="login" type="submit" class="btn btnCSS">
		<br /><br />

		<a href="forgotpwd.php" class="needunderline">Forgot Password</a>
		&nbsp; || &nbsp; <a href="register.php" class="needunderline">Register</a>

	<?php form_setup_end(); ?>

	<br>

	<!-- <footer>
		<center>Here goes the footer</center>
	</footer> -->

</section>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="js/main.js"></script> -->

</body>
</html>