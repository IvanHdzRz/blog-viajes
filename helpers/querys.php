<?php 
    

    function insertNewUser($connection,$newUserData){
        $queryInsertUser='INSERT INTO usuarios (id,user_name,email,password,fecha) 
            VALUES (null,'.'"'.$newUserData['username'].'",'.'"'.$newUserData['email'].'",'.
            '"'.$newUserData['password'].'"'.',curdate())';
        
        $sucessInsertUser=mysqli_query($connection,$queryInsertUser);
        return $sucessInsertUser;
    }
?>