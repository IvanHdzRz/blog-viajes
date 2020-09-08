<?php 
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password_confirm=$_POST['confirm_password'];

    echo $user_name.' '.$email.' '.$password.' '.$password_confirm;
?>