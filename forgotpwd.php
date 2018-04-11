
<?php
    include('included_functions.php');
?>

<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>

<div class="left-img"></div>

<section class="content">
    <?php form_setup_start("Verification") ?>

        <br /><br />
        Email: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" class="input-style" id="email"><br /><br />

        <br /><br /><br />
        <button type="submit" name="submit" class="btn btnCSS">Submit</button>

    <?php form_setup_end(); ?>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="/vendor/tether/js/tether.min.js"></script>
<link rel="stylesheet" href="/vendor/formvalidation/dist/css/formValidation.min.css">
<script src="js/main.js"></script>
</body>
</html>