<?php

include('included_functions.php');

require_once('session.php');

$mysqli=db_connection();

verify_login();

new_header();
nav_bar();

if (isset($_POST['submit'])){
    if(isset($_POST['searchbook']) && !empty($_POST['searchbook'])){
        $query="select Books.Book_Name, Books.Book_ID, Users.FName, Users.LName, Users_Books.Year_Read ";
        $query.="from Books natural join Users_Books natural join Users";
        $result = $mysqli->query($query);
        $code=null;
        $val=null;
        while($row = $result->fetch()){
            if(strtolower($row['Book_Name'])==strtolower($_POST['searchbook'])){
                $code = $code.$row['FName']." ".$row['LName']."<br />";
            }
        }
        if($code ===null){ $code = 1;}
    }else{
        $val = 'Nothing to Display';
    }
}

?>
<div class="left-img"></div>
<section class="content">
    <div class="container text-center">
        <form method="POST" action="">
            <input type="text" name="searchbook" placeholder="Name the book">
            <input type="submit" name="submit" value="search" class="btn btnCSS border">
        </form>
        <div class="col-lg-12" id="updatedfield">
            <?php

                if($code!=1 && $code !==null){
                    $val = $code;
                }elseif($code){
                    $val = "No Match";
                }
                echo "<script>document.getElementById('updatedfield').innerHTML='$val'</script>";
            ?>
        </div>
    </div>
</section>





<?php footer(); ?>