<?php

    require('included_functions.php');
    require('session.php');

    verify_login();

    $mysqli = db_connection();

    new_header();

    nav_bar();

    if(isset($_GET['id'])){
        $user_id=$_GET['id'];

        $name=null;
        $books_read=null;
        $Authors = null;
        $Genre=null;

        //Books
        $query = "SELECT * FROM Users natural join Users_Books natural join Books WHERE Users.User_ID= :userid ORDER BY Books.Book_Name ASC";
        $result=$mysqli->prepare($query);
        $result->execute(array('userid'=>$user_id));
        while($row=$result->fetch()){
            $name="<h3><b>".$row['FName']." ".$row['LName']."</b></h3>";
            $books_read=$books_read.$row['Book_Name']."<br />";
        }

        //Authors
        $resultA=$mysqli->prepare("SELECT distinct(Author.AFName), Author.ALName from Users natural join Users_Books natural join Books natural join Author WHERE Users.User_ID=:userid ORDER BY Author.ALName");
        $resultA->execute(array('userid'=>$user_id));
        while($row=$resultA->fetch()){
            $Authors=$Authors.$row['AFName']." ".$row['ALName']."<br />";
        }

        //Genre
        $resultG=$mysqli->prepare("SELECT distinct(Genre.GenreN) from Users natural join Users_Books natural join Books natural join Genre WHERE Users.User_ID=:userid ORDER BY Genre.GenreN");
        $resultG->execute(array('userid'=>$user_id));
        while($row=$resultG->fetch()){
            $Genre=$Genre.$row['GenreN']." ";
        }

    }

?>

<br /> <br />
<div class="container">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 text-center">
            <div id="name">
            </div>
            <br />
            <h5><b>Books Read:</b></h5><hr />
            <div id="books">
            </div>
            <hr />
            <h5><b>Preferred Authors:</b></h5><hr />
            <div id="authors">
            </div>
            <hr />
            <h5><b>Preferred Genre:</b></h5><hr />
            <div id="genre">
            </div>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>
<br /><br /><br />
<?php

    if($name != null){
        echo'<script>document.getElementById("name").innerHTML="'.$name.'"</script>';
    }
    if($books_read != null){
        echo'<script>document.getElementById("books").innerHTML="'.$books_read.'"</script>';
    }
    if($Authors != null){
        echo'<script>document.getElementById("authors").innerHTML="'.$Authors.'"</script>';
    }
    if($Genre != null){
        echo"<script>document.getElementById('genre').innerHTML='$Genre'</script>";
    }




    footer();

?>