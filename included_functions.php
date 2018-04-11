<?php
    function db_connection(){
        echo 'hello World';
    }

    function form_setup_start($Page){
        echo "<div class='container'>
                <div class='row'>

                    <div class='col-lg-3'></div>
                    <div class='form-style col-lg-6 col-sm-12 col-xs-12 center'>

                        <center>
                        <h3>$Page</h3>
                        <br />
                        <p>
                        <form action='' method='POST'>";
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