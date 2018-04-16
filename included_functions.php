<?php
    function db_connection(){
        require_once('../../connection.php');
        $mysqli = new PDO('mysql:host=localhost;dbname='.dbname,username,password);

        return $mysqli;
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

        </head>
        <body>

        <section class='header'>

        </section>";
    }

    function nav_bar(){
        echo "<nav class='navbar navbar-expand-lg navbar-light main_color'>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav w-100 justify-content-center'>
                <li class='nav-item active'>
                    <a class='nav-link' href='home.php'>Home <span class='sr-only'>(current)</span></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='update.php'>Update</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='#'>Delete</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='#'>Search All</a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Search Query
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='#'>Books Read</a>
                        <a class='dropdown-item' href='#'>Authors</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='#'>Genre</a>
                    </div>
                </li>
            </ul>
      </div>
    </nav>";
    }

    function footer(){
        echo "<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
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
?>