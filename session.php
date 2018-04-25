<?php

    session_start();

    function message(){
        if ($_SESSION['message'] !== ""){
            $message = $_SESSION['message'];
            $_SESSION['message'] = "";
            return $message;
        }
    }

    function verify_login(){
        if((!isset($_SESSION['email_id']) && $_SESSION['email_id'] === null) && (!isset($_SESSION['user_id']) && $_SESSION['user_id'] === null)){
            $_SESSION['message'] = 'You must login first!';
            header('Location: /~aghimire/ReadAndFind/');
            exit;
        }
    }

    function logged_in(){
        if((!isset($_SESSION['email_id']) && $_SESSION['email_id'] === null) && (!isset($_SESSION['user_id']) && $_SESSION['user_id'] === null)){
            $_SESSION['message'] = 'You must login first!';
            return false;
        }else{
            return true;
        }
    }


?>