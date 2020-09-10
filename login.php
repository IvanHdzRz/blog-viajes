<?php 
    include_once './includes/header.php';
    $activePage='login';
    $darkNav=true;
    include_once './includes/navigation.php';
?>
<div class="login">
    
    <form class="login-form">
        <h1>Login</h1>
        <p>it's a pleasure to see you again</p>
        <input type="text" placeholder="user name" class="input-text"/>
        <input type='password' placeholder="password"  class="input-text"/>
        <div class="sign-up">
            <a href="signup.html" class='redirect-signup-sign-in'>create account</a>
            <input type='submit' value='sign in' class="btn primary" />
        </div>
            
    </form>
    
</div>
</html>