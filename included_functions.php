<?php
    function db_connection(){
        echo 'hello World';
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

    function form_setup_start($Page,$welcome=""){
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
?>