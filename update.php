<?php
    require("included_functions.php");

    $mysqli=db_connection();

    new_header("Query | Read And Find");
    nav_bar();
    echo '<div class="left-img"></div>';
    echo '<br /><br /><br />';

    form_setup_start('Book');
?>

        <div>
			<h6>Book's Name</h6><input type="text" name="email" class="input-style form-control form-control-edit" id="validationCustomUsername" textholder="Book's name"required>
			<div class="invalid-feedback">
          		Please specify the Book's name.
            </div><br />
            <br /><h6>ISBN No:</h6><input type="password" name="pwd" value="" class="input-style form-control form-control-edit"><br />
            <br /><h6>Author's First Name</h6><input type="password" name="pwd" value="" class="input-style form-control form-control-edit"><br />
            <br /><h6>Author's Last Name</h6><input type="password" name="pwd" value="" class="input-style form-control form-control-edit"><br />
            <br /><h6>Genre</h6><input type="password" name="pwd" value="" class="input-style form-control form-control-edit"><br />

        <!-- <h6>ISBN Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="isbn" class="input-style form-control" id="validationCustomUsername" required><br /><br />
            Author's First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="afname" class="input-style form-control" id="validationCustomUsername" required><br /><br />
            Author's Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="alname" class="input-style form-control" id="validationCustomUsername" required><br /><br />
            Genre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="genre" class="input-style form-control" id="validationCustomUsername" required><br /><br />
        </h6> -->

        </div><br /><br />

		<input name="submit" value="login" type="submit" class="btn btnCSS">


<?php
    form_setup_end();

    footer();
?>