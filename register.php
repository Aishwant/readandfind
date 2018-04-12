<?php
    include('included_functions.php');
?>

<?php new_header("Register"); ?>

<div class="left-img"></div>

<section class="content">

    <?php form_setup_start("Register"); ?>

        <div>
            <h6>First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fname" class="input-style form-control" id="validationCustomUsername" required><br /><br />
            Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="lname" class="input-style form-control" id="validationCustomUsername" required><br /><br />
            Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" class="input-style form-control" id="validationCustomUsername" required><br /><br />
            Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" class="input-style form-control" id="validationCustomUsername" required><br /><br />
            Retype Password: &nbsp;&nbsp;&nbsp; <input type="password" name="re-pwd" class="input-style form-control" id="validationCustomUsername" required><br /><br /><br />
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