<?php

    function db_connection(){
        require_once('../../connection.php');

        try{
            $mysqli = new PDO("mysql:host=localhost;dbname=".dbname,username,password);
            $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $mysqli;
        }catch(PDOException $e){
            echo "Database Operations Failed: " . $e->getMessage();
        }
    }

    function redirect_to($page){
        header('Location: '.$page);
    }

    function new_header($title){
        echo "<!DOCTYPE html>
        <html>
        <head>

            <meta http-equiv='Content-Type' content='text/html' charset='utf-8' />
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>

            <title>$title</title>

            <link rel='stylesheet' href='css/bootstrap.min.css' />
            <link rel='stylesheet' href='css/main.css' />
            <link rel='stylesheet' href='fontawesome/css/fontawesome-all.css' />

        </head>
        <body>
        <section class='header'>";
    }

    function nav_bar(){
        echo "
            <nav class='navbar navbar-expand-lg navbar-light main_color'>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav w-100 justify-content-center'>
                        <li class='nav-item active'>
                            <a class='nav-link' href='home.php'>Home <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='newentry.php'>New Entry <i class='fas fa-book'></i> <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Search Query
                            </a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <a class='dropdown-item' href='booksread.php'>Books Read</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='commonbooks.php'>People With Common Books</a>
                            </div>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='profile.php?id=".$_SESSION['user_id']."'>My Profile</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Logout <i class='fas fa-sign-out-alt'></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </section>";

    }

    function footer(){
        echo "
        <footer class='footer'>
            <div class='container'>
                <center><span class='text-muted'>&copy; 2018 Copyright: </span>Aishwant Ghimire</center>
            </div>
        </footer>
        <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/main.js'></script>
    </body>
    </html>";
    }

    function form_setup_start($Page="",$welcome=""){
        echo "<div class='container'>
                <div class='row'>

                    <div class='col-lg-3'></div>
                    <div class='form-style col-lg-6 col-sm-12 col-xs-12 center'>

                        <center>
                        <h1>$welcome</h1>
                        <h3>$Page</h3>
                        <br />
                        <p>
                        <form action='' method='POST' class='needs-validation' novalidate>";
    }

    function form_setup_end(){
        echo "          </form>
                        </p>
                        </center>

                    </div>
                    <div class='col-lg-3'></div>

                </div>
            </div>";
    }

    function password_check(){
        return false;
    }

    function logout(){
        $_SESSION['user_id']=null;
        $_SESSION['email_id']=null;
        session_destroy();
        header('Location: /~aghimire/ReadAndFind');
    }
?>