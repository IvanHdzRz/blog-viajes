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
    include '../helpers/DBConector.php';

    session_start();
    //validar que lleguen datos atravez de POST
    $isEmpty=!(validateEmptyData($_POST));
    //si esta vacio redirigir a pagina de registro
    if($isEmpty){
        header("Location: ../signup.php");
    }

    //si llegan datos crea array
    $newUserData=[
        'username'=>$_POST['user_name'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password'],
        'password_confirm'=>$_POST['confirm_password'],
    ];

    //valida todos datos recibidos
    $errors=validateFormatData($newUserData);
    //cuenta cuantos errores hubo
    $errorsCount=0;
    foreach($errors as $error){
        $errorsCount+=count($error);
    }
    //si hubo errores se crea una variable de sesion con los errores y se redirige hacia el form de registro
    

    if($errorsCount>0){
        $_SESSION['signup-errors']=$errors;
        header("Location: ../signup.php");
    }
    //si no se valida los el user y el email en la base de datos para verificar que no este registrado un usuario con esos datos
    if($_SESSION['dbconnection_status']==='ok'){
        $getCategories=mysqli_query($connection,'SELECT * FROM categorias');
        
        while($cat=mysqli_fetch_assoc($getCategories)){
            var_dump($cat);
        }
    }
    
    ?>