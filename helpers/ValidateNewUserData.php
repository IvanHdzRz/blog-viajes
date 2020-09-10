<?php 
    function validateEmptyData($newUserData){
        return $isValid=isset($newUserData['user_name'])&&isset($newUserData['email'])&&isset($newUserData['password'])&&isset($newUserData['confirm_password']);
    }
    function validateFormatData($newUserData){
        $email_errors=[];
        $user_name_errors=[];
        $password_errors=[];

        $user_name_regexp='(^[a-z]+[0-9]*[a-z])';
        //si el email no tiene el formato correcto
        if(!(filter_var($newUserData['email'], FILTER_VALIDATE_EMAIL))){
            array_push($email_errors,'tu email no es valido');    
        }
        //valida que el nombre de usuario empiece con una letra puede contener numeros y letras
        //despues de eso. solo se aceptan numeros y letras
        if(!preg_match($user_name_regexp,$newUserData['username'])){
            array_push($user_name_errors,'el nombre de usuario debe iniciar por una letra y solo puede contener numeros 0-9 y letras a-z');
        }
        if(trim($newUserData['password'])===''){
            array_push($password_errors,'debes poner una contraseña');
        }
        if(trim($newUserData['password'])!==trim($newUserData['password_confirm'])){
            array_push($password_errors,'las contraseñas deben coincidir');
        }

        $errors=[
            'username'=>$user_name_errors,
            'email'=>$email_errors,
            'password'=>$password_errors
        ];
        return $errors;
    }
?>