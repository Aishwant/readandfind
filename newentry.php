<?php
    require('included_functions.php');
    $mysqli = db_connection();

    require('session.php');

    verify_login();

    new_header();

    nav_bar();

    echo"<br /><br />";
    //form_setup_start("Yay! Keep Reading");
?>

<div class="left-img"></div>
<section class="content">
    <div class="container text-center">
        <form method="POST" action="">

            <h6>Book: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="book_name" class="form-control" id="validationCustomUsername" required><br /><br />
            Author's First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="AuthorFName" name="lname" class="form-control"><br /><br />
            Author's Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="AuthorLName" class="form-control"><br /><br />
            ISBN: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ISBN" class="form-control"><br /><br />
            Genre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="genre" class="form-control"><br /><br /><br />
            Year Read: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="yearRead" class="form-control"><br /><br /><br />
            </h6>

            <input type="submit" name="submit" value="Enter" class="btn btnCSS">
            <br /><br />

        </form>
    </div>
</section>

<?php
//    form_setup_end();
?>

<?php footer(); ?>