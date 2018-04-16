<?php
	include('included_functions.php');
	$mysqli = db_connection();

	require_once('session.php');

	if($mysqli->connect_errno) {
		die("Could not connect to server ".dbname."<br />");
	} else {
		try{
			$query = "select * ";
			$query .= "from Users";
			$query .= "where  = ?";
			$result = $mysqli->query($query);
			//$result = $mysqli->prepare($query);

			if(isset($_POST['submit'])){
				if (isset($_POST['email']) && $passwd = isset($_POST['pwd'])){
					$email = $_POST['email'];
					$password = $_POST['pwd'];
					echo $email." ".$password;
					$count = -1;
					while($row = $result->fetch()){
					//while($row = $result->fetch(PDO::FETCH_ASSOC)){
						if ($email == $row['Email_ID'] && $password == $row['Password']){
							$_SESSION['email_id']= $row['Email_ID'];
							$_SESSION['user_id']=$row['User_ID'];
							header('Location: home.php?user='.$row['FName']);
							$count = 1;
						}
					}if($count === -1){
						echo "<div class='alert-login'>Please login with the correct Email/Password</div>";
					}
				}
			}
		}
		catch(PDOException $e)
		{
			echo "Database Operations Failed: " . $e->getMessage();
		}
	}
?>

<?php new_header("READ and FIND | Login"); ?>

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

<?php footer(); ?>