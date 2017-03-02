<?php

if ( $_SESSION['admin-login'] !== true ) { 
    echo "you didnt login!!"; 
    die(); 
    
}