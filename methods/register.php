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

    if(!isset($_SESSION)){
        session_start();
    }
    //validar que lleguen datos atravez de POST
    $isEmpty=!(validateEmptyData($_POST));
    //si esta vacio redirigir a pagina de registro
    if($isEmpty){
        header("Location: ../signup.php");
    }

    //si llegan datos crea array
    $newUserData=[
        'username'=>trim($_POST['user_name']),
        'email'=>trim($_POST['email']),
        'password'=>trim($_POST['password']),
        'password_confirm'=>trim($_POST['confirm_password']),
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
        include '../helpers/querys.php';

        $queryVerifyUserName="SELECT * FROM usuarios WHERE user_name=".'"'.$newUserData['username'].'"';
        
        $queryVerifyEmail='SELECT * FROM usuarios WHERE email='.$newUserData['email'];
        
        $sucessInsertUser=insertNewUser($connection,$newUserData);
        
        //si se pudo crear el nuevo usuario redirigir a pagina de exito y 
        //cambiar su log  status a login
        if($sucessInsertUser){
            echo 'usuario insertado';
            $_SESSION['login-status']='authenticated';

        }else{
            echo 'no se pudo joven';
        }
        
    }else{
        //redirigir a una pagina de error para intentarlo mas tarde 
        //o redirigir al formulario de registro indicando que un error ocurrio
    }
    
    ?>