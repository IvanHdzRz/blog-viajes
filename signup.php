<?php 
    include_once './includes/header.php';
    $activePage='sign up';
    $darkNav=true;
    include_once './includes/navigation.php';
    session_start();
    var_dump($_SESSION['signup-errors']);
?>

<div class="login">
    <div class='container'>
        <form class="login-form" action='methods/register.php' method="POST">
            <h1>Sign up</h1>
            <p>
                we are excited about everything you have to share
            </p>
            <input type="text" placeholder="user name" name='user_name' class="input-text"/>
            <input type="email" placeholder="email" name='email' class="input-text"/>
            <input type='password' placeholder="password" name='password' class="input-text"/>
            <input type='password' placeholder="confirm your password" name='confirm_password'  class="input-text"/>
            <div class="sign-up">
                <a href="login.html" class='redirect-signup-sign-in'>
                    I already have an account
                </a>
                <input type='submit' value='register' class="btn primary" />
            </div>
            
        </form>
        <?php 
            //se restablece el array de errores
            $_SESSION['signup-errors']=null;
        ?>
</div>
</div>
</html>