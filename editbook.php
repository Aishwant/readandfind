<?php
    require('included_functions.php');
    $mysqli = db_connection();
    require('session.php');
//verify_login();
    new_header("EDIT");
    nav_bar();
    echo"<br /><br />";
    //form_setup_start("Yay! Keep Reading");
?>


<?php
    if(isset($_POST['submit'])){
        echo "reached";
        if(isset($_GET["bookid"]) && $_GET["bookid"] !==""){
            echo "reached";
            if(($_SESSION['book_name']!=$book_name)||($_SESSION['afname']!=$AuthorFName)||($_SESSION['alname']!=$AuthorLName)||($_SESSION['isbn']!=$ISBN)||($_SESSION['genre']!==$genre)||($_SESSION['year']!==$yearRead)){
                //User-defined variables
                echo "reached";
                $b_id=$_GET['bookid'];
                $book_name = $_POST['book_name'];
                $AuthorFName = $_POST['AuthorFName'];
                $AuthorLName = $_POST['AuthorLName'];
                $ISBN = $_POST['ISBN'];
                $genre= $_POST['genre'];
                $yearRead= $_POST['yearRead'];

                $a=0;//a variable to check if the Author exists or not
                $b=0;
                $b_ID=0;//keep track of the book's id
                $a_ID=0;//keep track of the author's id

                $query_get_Author = "SELECT * FROM Author ORDER BY Author_ID";
                $result_get_Author = $mysqli->query($query_get_Author);
                while($row1 = $result_get_Author->fetch()){
                    if((strtolower($row1['AFName'])==strtolower($AuthorFName))&&(strtolower($row1['ALName'])==strtolower($AuthorLName))){
                        $a=$row1['Author_ID'];
                    }
                    $a_ID=$row1['Author_ID'];
                }
                $a_ID=$a_ID+1;

                // if($c === 1){
                //     $_SESSION['message']="<div class='alert-login'>Book already exists</div>";
                if($a === 0){
                        //insert into author
                        $query_insert_Author = ("INSERT INTO Author(Author_ID, AFName, ALName) VALUES (:id,:afname,:alname)");
                        $result_Author = $mysqli->prepare($query_insert_Author);
                        $result_Author->execute(array('id'=>$a_ID,'afname'=>$AuthorFName,'alname'=>$AuthorLName));
                        //update into books
                        $query_insert_Books = ("UPDATE Books SET ISBN=:isbn, Book_Name=:book, Author_ID=:aid, Genre_ID=:gid WHERE Book_ID=:bid");
                        $result1 = $mysqli->prepare($query_insert_Books);
                        $check=$result1->execute(array('bid'=>$b_id,'isbn'=>$ISBN,'book'=>$book_name,'aid'=>$a_ID,'gid'=>$genre));
                        if($check){
                            $_SESSION['message']="<div style='background-color:#aaa;'>Updated</div>";
                        }else{
                            $_SESSION['message']="<div style='background-color:#aaa;'>Error Updating: Please delete entry and create a new one</div>";
                        }
                        redirect_to('home.php');
                }else{
                        //update into books
                        $query_insert_Books = ("UPDATE Books SET ISBN=:isbn, Book_Name=:book, Author_ID=:aid, Genre_ID=:gid WHERE Book_ID=:bid");
                        $result1 = $mysqli->prepare($query_insert_Books);
                        $check=$result1->execute(array('bid'=>$b_id,'isbn'=>$ISBN,'book'=>$book_name,'aid'=>$a,'gid'=>$genre));
                        if($check){
                            $_SESSION['message']="<div style='background-color:#aaa;'>Updated</div>";
                        }else{
                            $_SESSION['message']="<div style='background-color:#aaa;'>Error Updating: Please delete entry and create a new one</div>";
                        }
                        redirect_to('home.php');
                }
                // }elseif($c1===1 && $c===0){ //if book is already in the book table
                //     $query_insert_UB =("INSERT INTO Users_Books(User_ID, Book_ID, Year_Read) VAlUES (".$_SESSION['user_id'].",$b,:yr)");
                //     $result_insert_UB = $mysqli->prepare($query_insert_UB);
                //     $result_insert_UB->execute(array('yr'=>$yearRead));
                //     $_SESSION['message']="<div style='background-color:#aaa;'>Added</div>";
                // }
            }
        }
    }
?>



<div class="left-img"></div>

<?php echo message(); ?>

<section class="content">
    <div class="container text-center">
        <form method="POST" action=''>

            <?php
                $book_id=$_GET['bookid'];
                $query = "SELECT * FROM Users natural join Users_Books natural join Books natural join ";
                $query .= "Author natural join Genre where User_ID =:user_id  and Book_ID =:book_id ";
                $result = $mysqli->prepare($query);
                $result->execute(array('user_id'=>$_SESSION['user_id'],'book_id'=>$book_id));
                if ($result){
                    $row2 = $result->fetch();

                    $_SESSION['book_name']=$row2['Book_Name'];
                    $_SESSION['afname']=$row2['AFName'];
                    $_SESSION['alname']=$row2['ALName'];
                    $_SESSION['isbn']=$row2['ISBN'];
                    $_SESSION['genre']=$row2['GenreN'];
                    $_SESSION['year']=$row2['Year_Read'];

                    echo "<h6>Book: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='book_name' class='form-control' id='validationCustomUsername' value='".$row2['Book_Name']."' required><br /><br />
                    Author's First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='AuthorFName' class='form-control' value='".$row2['AFName']."'><br /><br />
                    Author's Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='AuthorLName' class='form-control' value='".$row2['ALName']."'><br /><br />
                    ISBN: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='ISBN' class='form-control' value='".$row2['ISBN']."'><br /><br />
                    Genre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    <select name='genre'>";
            ?>
            <?php
                    $query_get_Genre = "select * from Genre";
                    $result_get_Genre = $mysqli->query($query_get_Genre);
                    $val="";
                    while($row1 = $result_get_Genre->fetch()){
                        if($row2['GenreN']===$row1['GenreN']){
                            $val = "selected='selected'";
                        }
                        echo "<option value='".$row1['Genre_ID']."' $val>".$row1['GenreN']."</option>";
                        $val = "";
                    }
            ?>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br /><br />
                    Year Read: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='yearRead' class='form-control' value='<?php echo $row2['Year_Read'].""?>'><br /><br /><br />
                    </h6>
            <?php
                } //closing the if statement above
            ?>
            <input type="submit" name="submit" value="Enter" class="btn btnCSS">
            <br /><br />

        </form>
    </div>
</section>

<?php
//    form_setup_end();
?>

<?php footer(); ?>