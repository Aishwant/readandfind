<?php include_once('included_functions.php');

    require_once('session.php');

    new_header("HOME | READ and FIND");

    nav_bar();

    verify_login();

?>


    This is your home page.
    <div class="left-img">
    </div>
    <h4><center><?php echo"Hello ".$_SESSION['fname'];?></center></h4>

   <?php footer(); ?>