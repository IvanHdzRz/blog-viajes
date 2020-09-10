<?php 
    /*
        VERIFICAR QUE DATOS LLEGUEN POR POST
        --ERROR POR NO INTRODUCIR DATOS
        CREAR ARRAY CON DATA DEL USUARIO
        VALIDAD QUE TENGA FORMATO CORRECTO
        --ERRORES EN FORMATO
        VALIDAR QUE NO ESTE EN DB PREVIAMENTE NI EMAIL NI USERNAME
        --ERROR USUARIO O EMAIL YA REGISTRADO
        SI PASA LO ANTERIOIR
        LLAMAR A FUNCION PARA CREAR UN NUEVO USUARIO
        --ERROR CONEXION ETC

    */
    include '../helpers/ValidateNewUserData.php';


    $isEmpty=!(validateEmptyData($_POST));
    //si esta vacio redirigir a pagina de registro
    if($isEmpty){
        header("Location: ../signup.php");
    }

    $newUserData=[
        'username'=>$_POST['user_name'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password'],
        'password_confirm'=>$_POST['confirm_password'],
    ];

    $errors=validateFormatData($newUserData);
    var_dump( $errors['email']);
    /*
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password_confirm=$_POST['confirm_password'];

    echo $user_name.' '.$email.' '.$password.' '.$password_confirm;
    */
    ?>