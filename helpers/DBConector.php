<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    /*database info*/
    $db_url='localhost';
    $db_user='root';
    $db_pass='';
    $db_schema='blog-viajes';

    //database connection
    $connection=mysqli_connect($db_url,$db_user,$db_pass,$db_schema);

    $_SESSION['dbconnection_status']=mysqli_connect_errno()==0?'ok':'error';
    if($_SESSION['dbconnection_status']==='ok'){
        mysqli_query($connection,"SET NAME 'UTF-8'");
    }

?>