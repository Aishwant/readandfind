<?php
	include('included_functions.php');
?>

<?php new_header("Login"); ?>

<div class="left-img"></div>

<section class="content">

	<?php form_setup_start("Login Here","Welcome"); ?>

		<div>
			<h6>Email ID: </h6><input type="text" name="email" class="input-style form-control form-control-edit" id="validationCustomUsername" required>
			<div class="invalid-feedback">
          		Please choose an email.
			</div>
			<br /><br />
			<h6>Password: </h6><input type="password" name="pwd" value="" class="input-style form-control form-control-edit" id="validationCustomUsername" required>
			<div class="invalid-feedback">
          		Please choose your password.
        	</div>
		</div><br /><br />

		<input name="submit" value="login" type="submit" class="btn btnCSS">
		<br /><br /><br />

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
	<script src="js/main.js"></script>

</body>
</html>