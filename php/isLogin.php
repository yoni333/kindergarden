<?php

if ( !isset($_SESSION['isLogin']) ){
  
    die();
    
    
} else {
     
    if ( $_SESSION['isLogin'] !== 'login'  ){
       
        
        die();
    }
    
    
}

