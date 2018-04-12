
<?php
    include('included_functions.php');
?>

<?php new_header('Forgot Password'); ?>

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

</body>
</html>