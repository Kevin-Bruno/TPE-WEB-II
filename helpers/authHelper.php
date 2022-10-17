<?php

class authHelper{


    function __construct(){
        
    }
    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['IS_LOGGED'])){
            header("Location: " . LOGIN);
        }
    }
    function logout(){
        session_start();
        session_destroy();
    }
}