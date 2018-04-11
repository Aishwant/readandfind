<?php
    include('included_functions.php');
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo strtoupper(basename($_SERVER['REQUEST_URI'],".php"));?> | READ and FIND</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />

</head>
<body>

<section class="header">

</section>

<div class="left-img"></div>

<section class="content">

    <?php form_setup_start("Register"); ?>

        <div>
            <h6>First Name: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="fname" class="input-style"><br /><br /><br />
            Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="lname" class="input-style"><br /><br /><br />
            Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" class="input-style"><br /><br /><br />
            Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" class="input-style"><br /><br /><br />
            Retype Password: &nbsp;&nbsp;&nbsp; <input type="password" name="re-pwd" class="input-style"><br /><br /><br /><br />
            </h6>
        </div>
        <input type="submit" name="submit" value="Register" class="btn btnCSS">
        <br /><br />
        <p><a href="/ReadAndFind/" class="needunderline">Already have an account?</a></p>
    <?php form_setup_end(); ?>

</section>


            <script src="js/main.js"></script>

</body>
</html>