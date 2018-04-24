<?php

    include_once('included_functions.php');

    require_once('session.php');

    new_header("HOME | READ and FIND");

    nav_bar();

    verify_login();

        $mysqli=db_connection();

        $user_id = (int)$_SESSION['user_id'];

        $query = "select * ";
        $query .= "from Users_Books natural join Books natural join Author natural join Genre ORDER BY Users_Books.Book_ID DESC";

        $result=$mysqli->query($query);
        //print_r($result);

?>

    <div class="left-img">
    </div>
    <br />
    <h4><center><?php echo"Hello ".$_SESSION['fname'];?></center></h4>

    <?php
        $message = message();
        if($message){
            echo $message;
        }
    ?>

    <div class='container'>
        <div class="row">
            <div class = "col-lg-6 col-md-5">
            </div>
            <div class = "col-lg-6 col-md-7 col-sm-12 col-xs-12">
                <br />Recent Entries:
                <div style='text-align:right; margin: 0px;'><a href='booksread.php'>See More...</a></div><br />
                <?php
                    //print_r($result);
                    $b=0;
                    while($row = $result->fetch()){
                        if ($row['User_ID']==$user_id && ($b < 3)){
                            echo"<div class='books'>

                                <center>".$row['Book_Name']."<br /></center><br />

                                Author: ".$row['AFName']." ".$row['ALName']."<br />
                                Genre: ".$row['GenreN']."<br />
                                Year Read: ".$row['Year_Read']."<br />

                                <div style='text-align:right; padding-right:5%;'>
                                    <a href='deletebook.php?bookid=".$row['Book_ID']."'>Remove</a> | <a href='editbook.php?bookid=".$row['Book_ID']."'>Edit</a>
                                </div>
                                <br/>

                            </div>";
                            $b=$b+1;
                        }
                    }

                ?>
                    <br />
            </div>
        </div>
    </div>

   <?php footer(); ?>