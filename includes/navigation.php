<?php  
   $sections= Array(
        ["name" => "home", 'link'=>'index.php' ],
        ['name'=>'login', 'link'=>'login.php' ],   
        ['name'=>'sign up', 'link'=>'signup.php' ],
        ['name'=>'about us', 'link'=>'index.php' ]
    );
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
