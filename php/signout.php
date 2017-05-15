<?php
session_start();
 $_SESSION['isLogin'] = false;
 $_SESSION['private_name'] = '';
 $_SESSION['family_name'] = '';
 $_SESSION['userID'] = '';
 
 //print_r($_SESSION);

$newURL = 'http://pupick.de/app-pupick/';
       
header('Location: '.$newURL);

die();