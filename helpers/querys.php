<?php 
    

    function insertNewUser($connection,$newUserData){
        //cifrado de contraseñas
        $encriptedPassword=password_hash($newUserData['password'],PASSWORD_BCRYPT,['cost'=>4]);
       
        //insercion en base de datos
        $queryInsertUser='INSERT INTO usuarios (id,user_name,email,password,fecha) 
            VALUES (null,'.'"'.$newUserData['username'].'",'.'"'.$newUserData['email'].'",'.
            '"'.$encriptedPassword.'"'.',curdate())';
        
        $sucessInsertUser=mysqli_query($connection,$queryInsertUser);
        return $sucessInsertUser;
    }
?>