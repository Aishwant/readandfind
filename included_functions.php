<?php
    function db_connection(){
        echo 'hello World';
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