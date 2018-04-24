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
        if(isset($_POST['book_name'])){

                //User-defined variables
                $book_name = $_POST['book_name'];
                $AuthorFName = $_POST['AuthorFName'];
                $AuthorLName = $_POST['AuthorLName'];
                $ISBN = $_POST['ISBN'];
                $genre= $_POST['genre'];
                $yearRead= $_POST['yearRead'];

                $query_get = ("SELECT * FROM Users NATURAL JOIN Users_Books NATURAL JOIN Books WHERE User_ID =".$_SESSION['user_id']." ORDER BY Books.Book_ID");
                $query_get_Author = "SELECT * FROM Author ORDER BY Author_ID";

                //$result_get = $mysqli->query($query_get);
                $result_get = $mysqli->prepare($query_get);
                $result_get->execute(array('book'=>$book_name));

                $c=0;//a variable to check if the Book exists or not for the user
                $c1=0;//check if the book exist in the whole database
                $a=0;//a variable to check if the Author exists or not
                $b=0;
                $b_ID=0;//keep track of the book's id
                $a_ID=0;//keep track of the author's id

                while($row = $result_get->fetch()){
                    if(strtolower($row['Book_Name'])==strtolower($book_name)){
                        $c=1;
                    }
                }
                $result_books=$mysqli->query("SELECT * FROM Books ORDER BY Book_ID");
                while($row = $result_books->fetch()){
                    if(strtolower($row['Book_Name'])===strtolower($book_name)){
                        $c1=1;
                        $b=$row['Book_ID'];
                    }
                    $b_ID=$row['Book_ID'];
                }
                $result_get_Author = $mysqli->query($query_get_Author);

                while($row1 = $result_get_Author->fetch()){
                    if((strtolower($row1['AFName'])==strtolower($AuthorFName))&&(strtolower($row1['ALName'])==strtolower($AuthorLName))){
                        $a=$row1['Author_ID'];
                    }
                    $a_ID=$row1['Author_ID'];
                }
                $a_ID=$a_ID+1;
                $b_ID=$b_ID+1;

                if($c === 1){
                    $_SESSION['message']="<div class='alert-login'>Book already exists</div>";
                }elseif($c1===0 && $c===0){
                    if($a === 0){

                        //insert into author
                        $query_insert_Author = ("INSERT INTO Author(Author_ID, AFName, ALName) VALUES (:id,:afname,:alname)");
                        $result_Author = $mysqli->prepare($query_insert_Author);
                        $result_Author->execute(array('id'=>$a_ID,'afname'=>$AuthorFName,'alname'=>$AuthorLName));

                        //insert into books
                        $query_insert_Books = ("INSERT INTO Books(Book_ID, ISBN, Book_Name, Author_ID, Genre_ID) VALUES (:bid,:isbn,:book,:aid,:gid)");
                        $result1 = $mysqli->prepare($query_insert_Books);
                        $result1->execute(array('bid'=>$b_ID,'isbn'=>$ISBN,'book'=>$book_name,'aid'=>$a_ID,'gid'=>$genre));

                        //insert into Users_Books table
                        $query_insert_UB =("INSERT INTO Users_Books(User_ID, Book_ID, Year_Read) VAlUES (".$_SESSION['user_id'].",$b_ID,:yr)");
                        $result_insert_UB = $mysqli->prepare($query_insert_UB);
                        $result_insert_UB->execute(array('yr'=>$yearRead));
                    }else{
                        //insert into books
                        $query_insert_Books = ("INSERT INTO Books(Book_ID, ISBN, Book_Name, Author_ID, Genre_ID) VALUES (:bid,:isbn,:book,:aid,:gid)");
                        $result1 = $mysqli->prepare($query_insert_Books);
                        $result1->execute(array('bid'=>$b_ID,'isbn'=>$ISBN,'book'=>$book_name,'aid'=>$a,'gid'=>$genre));

                        //insert into Users_Books table
                        $query_insert_UB =("INSERT INTO Users_Books(User_ID, Book_ID, Year_Read) VAlUES (".$_SESSION['user_id'].",$b_ID,:yr)");
                        $result_insert_UB = $mysqli->prepare($query_insert_UB);
                        $result_insert_UB->execute(array('yr'=>$yearRead));
                    }
                    $_SESSION['message']="<div style='background-color:#aaa;'>Added</div>";

                }elseif($c1===1 && $c===0){ //if book is already in the book table
                    $query_insert_UB =("INSERT INTO Users_Books(User_ID, Book_ID, Year_Read) VAlUES (".$_SESSION['user_id'].",$b,:yr)");
                    $result_insert_UB = $mysqli->prepare($query_insert_UB);
                    $result_insert_UB->execute(array('yr'=>$yearRead));
                    $_SESSION['message']="<div style='background-color:#aaa;'>Added</div>";
                }
        }
    }
?>



<div class="left-img"></div>

<?php echo message(); ?>

<section class="content">
    <div class="container text-center">
        <form method="POST" action="">

            <?php
                $book_id=$_GET['bookid'];

                $query = "SELECT * FROM Users natural join Users_Books natural join Books natural join ";
                $query .= "Author natural join Genre where User_ID =:user_id  and Book_ID =:book_id ";

                $result = $mysqli->prepare($query);
                $result->execute(array('user_id'=>$_SESSION['user_id'],'book_id'=>$book_id));
                if ($result){
                    $row2 = $result->fetch();
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