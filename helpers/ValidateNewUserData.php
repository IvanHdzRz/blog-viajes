<?php 
    function validateEmptyData($newUserData){
        return $isValid=isset($newUserData['user_name'])&&isset($newUserData['email'])&&isset($newUserData['password'])&&isset($newUserData['confirm_password']);
    }
    function validateFormatData($newUserData){
        $errors=[];
        $email_errors=[];
        if(!(filter_var($newUserData['email'], FILTER_VALIDATE_EMAIL))){
            array_push($email_errors,'error en el formato');    
        }

        return $errors;
    }
?>