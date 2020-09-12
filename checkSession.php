<?php
    if(!isset($_SESSION)){
        session_start();
    }
    var_dump($_SESSION);
    var_dump(isset($_SESSION['login-status']));
?>