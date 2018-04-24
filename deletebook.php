<?php

    include('included_functions.php');
    include('session.php');
    verify_login();

    $mysqli = db_connection();

    if(isset($_GET["bookid"]) && $_GET["bookid"] !==""){
        $b_id = $_GET["bookid"];
        $query = ("DELETE FROM Users_Books WHERE User_ID = :user_id AND Book_ID = :book_id");
        $result = $mysqli->prepare($query);
        $check =$result->execute(array('user_id'=>$_SESSION['user_id'],'book_id'=>$b_id));
        if($check){
            $_SESSION['message']="<div style='background-color:#aaaaaa;'><center>The Book has been deleted</center></div>";
        }else{
            $_SESSION['message']="<div><center>Error! Couldn't delete the Book</center></div>";
        }
        redirect_to('home.php');
    }
?>