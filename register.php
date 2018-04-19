<?php
    include('included_functions.php');
    $mysqli = db_connection();
?>

<?php new_header("Register");
    include_once("session.php");
?>

<?php
if(isset($_POST['submit'])){
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['re-pwd'])){
        if($_POST['pwd']===$_POST['re-pwd']){
            // $query = "INSERT INTO Users VALUES (6,".$_POST['email'].",".$_POST['pwd'].",".$_POST['fname'].",".$_POST['lname'].")";
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['pwd'];
            $query = "select * ";
            $query .= "from Users";
            $result = $mysqli->query($query);
            $c=0;//a variable to check if the email address exists or not
            while($row = $result->fetch()){
                if($row['Email_ID']==$email){
                    $c = 1;
                }
                $id = $row['User_ID'];
            }
            $id = $id + 1;
            if($c === 0){
                $query1 = "insert into Users (User_ID, Email_ID, Password, FName, LName) ";
                $query1 .= "values ($id,'$email','$password','$fname','$lname')";
                $mysqli->query($query1);
                $_SESSION['email_id'] = $email;
                $_SESSION['fname'] = $fname;
                $_SESSION['user_id'] = $id+1;
                header('Location: home.php');
            }else{
                echo"<div class='alert-login'>Email already exists</div>";
            }
        }else{
            echo "<div class='alert-login'>Passwords didn't match </div>";
        }
    }
}
?>

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
        <p><a href="/~aghimire/ReadAndFind/" class="needunderline">Already have an account?</a></p>
    <?php form_setup_end(); ?>

</section>


<?php
    footer();
?>