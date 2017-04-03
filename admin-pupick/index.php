<?php
session_start();

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

$login_valid =false ;

$_SESSION['admin-login'] = $login_valid;

if ( !isset ( $_SESSION['admin-login-try']) ){
    
    $_SESSION['admin-login-try'] = 0;
    
} else {
    
    $_SESSION['admin-login-try'] = $_SESSION['admin-login-try']+1;
    
}

if ($_SESSION['admin-login-try'] > 10 ){
    
    die();
    //TODO get the IP adress of failed login try and ban it for hour
}

if ( isset($_GET['admin-username']) && isset($_GET['admin-password']) 
        && isset($_GET['admin-submit']) ){
    
    $username = $_GET['admin-username'];
    
    $password = $_GET['admin-password'];
 
    
    if (  
            
        ($username === 'ori' && $password ==='1982') || 
        
        ($username === 'yoni' && $password ==='1982')
            ){
        
        
                $login_valid = true ;
                $_SESSION['admin-login'] = $login_valid;
                $_SESSION['admin-name'] = $username;
                //zero the login counter
                $_SESSION['admin-login-try'] = 0;
                header("Location:http://pupick.de/app-pupick/admin-pupick/admin.php");
                    die();
         }
    
    
}


if ( $login_valid === false  ) {
    
  include('admin-login-view.html');
  
} else {
    
    
}