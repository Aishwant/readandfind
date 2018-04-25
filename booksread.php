<?php

    include_once('included_functions.php');

    require_once('session.php');

    new_header("Books Read | READ and FIND");

    nav_bar();

    verify_login();

        $mysqli=db_connection();
        //$mysqli->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        $user_id = (int)$_SESSION['user_id'];

        $query = "select * ";
        $query .= "from Users_Books natural join Books natural join Author natural join Genre ORDER BY Users_Books.Book_ID DESC";

        $result = $mysqli->query($query);
        $queryCount = "SELECT count(Book_ID) as `num` from Users_Books where User_ID=$user_id";
        $resultCount = $mysqli->query($queryCount);
        $rowCount = $resultCount->fetch();
        $count=$rowCount['num'];
?>

    <div class="left-img">
    </div>
    <br />
    <?php
        $message = message();
        if($message){
            echo $message;
        }
    ?>

    <h4><center><?php echo"Books You've Read";?></center></h4>

    <div class='container'>
        <div class="row">
            <div class = "col-lg-6 col-md-5">
            </div>
            <div class = "col-lg-6 col-md-7 col-sm-12 col-xs-12">
                <br /><br />
                <div id="numread"></div>
                <?php

                    while($row = $result->fetch()){
                            if ($row['User_ID']==$user_id){
                                echo"<div class='books'>

                                    <center>".$row['Book_Name']."<br /></center><br />

                                    Author: ".$row['AFName']." ".$row['ALName']."<br />
                                    Genre: ".$row['GenreN']."<br />
                                    Year Read: ".$row['Year_Read']."<br />

                                    <div style='text-align:right; padding-right:5%;'>
                                        <a href='deletebook.php?bookid=".$row['Book_ID']."'>Remove</a> | <a href='#'>Edit</a>
                                    </div>
                                    <br/>

                                </div>";
                            }
                    }
                    echo "<script>
                    document.getElementById('numread').innerHTML='Number of Books Read: $count';
                    </script>";
                ?>

            </div>
        </div>
    </div>

   <?php footer(); ?>