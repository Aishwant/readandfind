<?php

    session_start();

    function message(){
        if ($_SESSION['message'] != null){
        }
    }

    function verify_login(){
        if((!isset($_SESSION['email_id']) && $_SESSION['email_id'] === null) && (!isset($_SESSION['user_id']) && $_SESSION['user_id'] === null)){
            $_SESSION['message'] = 'You must login first!';
            header('Location: /');
            exit;
        }
    }

    function logged_in(){
        if((!isset($_SESSION['email_id']) && $_SESSION['email_id'] === null) && (!isset($_SESSION['user_id']) && $_SESSION['user_id'] === null)){
            return false;
        }else{
            return true;
        }
    }


?>