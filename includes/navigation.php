<?php  
   $sections= Array(
        ["name" => "home", 'link'=>'index.php' ],
        ['name'=>'about us', 'link'=>'index.php' ],
        ['name'=>'check','link'=>'checkSession.php']
    );

    //si esta logeando el usuario entonces solo muestra la opcion para cerrar sesion
    var_dump(isset($_SESSION['login-status']));
    if(isset($_SESSION['login-status'])){
        if($_SESSION['login-status']==='authenticated'){
            array_push($sections,['name'=>'logout','link'=>'checkSession.php']);
        }
    }else{ //si no esta logeado muestra opciones para inicio de sesion y registro
        array_push($sections,['name'=>'login','link'=>'login.php']);
        array_push($sections,['name'=>'signup','link'=>'signup.php']);
    }

    if(isset($darkNav)){
        $classNav=$darkNav?'navigation navigation-colored':'navigation';
        
    }else{
        $classNav='navigation';
    }
?>
<body>
    
    <nav id='navigation' class="<?php echo $classNav?>">
        <div class="home-logo">
            <img src='./static/img/logo.png' alt='logo' />
        </div>
        <ul class="nav-links">
            
            <?php 
                foreach($sections as $navItem):
                    $classLink=$navItem['name']==$activePage?'Link activeLink':'Link';
                    
                    echo '<li>'. 
                            '<a 
                                href="'.$navItem['link'].'" 
                                class="'.$classLink.'"   
                            '.'>'.
                                $navItem['name'].
                            '</a>
                        </li>';
                endforeach;
            ?>
        </ul>
        
    </nav>
