<?php include_once('included_functions.php');

    require_once('session.php');

    new_header("HOME | READ and FIND");

    nav_bar();

    verify_login();

        $mysqli=db_connection();

        $user_id = (int)$_SESSION['user_id'];

        $query = "select * ";
        $query .= "from Users_Books natural join Books";

        $result=$mysqli->query($query);
        //print_r($result);

?>

    <div class="left-img">
    </div>
    <br />
    <h4><center><?php echo"Hello ".$_SESSION['fname'];?></center></h4>

    <div class='container'>
        <div class="row">
            <div class = "col-lg-6 col-md-5">
            </div>
            <div class = "col-lg-6 col-md-7 col-sm-12 col-xs-12">
                <br />Recent Entries: <br /><br />

                <?php
                    //print_r($result);
                    $b=0;
                    while($row = $result->fetch()){
                        if ($row['User_ID']==$user_id && ($b < 3)){
                            echo"<div class='books'>

                                <center>".$row['Book_Name']."<br /></center><br />

                                Author: ".$row['Author_ID']."<br />
                                Genre: ".$row['Genre_ID']."<br />
                                Year Read: ".$row['Year_Read']."<br />

                                <div style='text-align:right; padding-right:5%;'>
                                    <a href='#'>Remove</a> | <a href='#'>Edit</a>
                                </div>
                                <br/>

                            </div>";
                            $b=$b+1;
                        }
                    }

                echo "<div style='text-align:right;'><a href='booksread.php'>See More...</a></div><br />";

                ?>

            </div>
        </div>
    </div>

   <?php footer(); ?>