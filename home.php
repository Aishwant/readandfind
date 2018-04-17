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

    <div class='container'>
        <div class="row">
            <div class = "col-lg-6 col-md-5">
            </div>
            <div class = "col-lg-6 col-md-7 col-sm-12 col-xs-12">
                <br />Recent Entries: <br /><br />
                <div class="books">

                    <center>Title:<br /></center><br />

                    Author:<br />
                    Genre:<br />
                    Year Read:<br />

                    <div style="text-align:right; padding-right:5%;">
                        <a href="#">Remove</a> | <a href="#">Edit</a>
                    </div>
                    <br/>

                </div>
            </div>
        </div>
    </div>
   <?php footer(); ?>