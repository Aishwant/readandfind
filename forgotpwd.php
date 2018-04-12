
<?php
    include('included_functions.php');
?>

<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/main.css" />

</head>
<body>

<div class="left-img"></div>

<section class="content">
    <?php form_setup_start("Verification") ?>

        <br /><br />
        <label for="validationcustom01">Email: </label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" class="input-style form-control" id="validationCustomUsername" required><br /><br />
        <div class="invalid-feedback">
          Please choose an email.
        </div>
        <br /><br /><br />
        <button type="submit" name="submit" class="btn btnCSS">Submit</button>
        <br /><br /><br /><br />
        <p><a href="/ReadAndFind/" class="needunderline">Wait! I remember my Password</a></p>

    <?php form_setup_end(); ?>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script>

    (function check(){
        'use strict';
        window.addEventListener('load', function(){
            //fetch all the forms we want to apply custom Validation
            var forms = document.getElementsByClassName('needs-validation');
            //Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms,function(form){
                form.addEventListener('submit',function(event){
                    if (form.checkValidity() === false){
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                },false);
            });
        }, false);
    })();

</script>
</body>
</html>