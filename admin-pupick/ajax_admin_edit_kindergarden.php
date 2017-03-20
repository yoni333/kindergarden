<?php
session_start();
include('login_check.php');
include('query.php');




$tmp = [] ;
$tmp[0] = true ;

//TODO filter this vars
$tmp[count($tmp)] = $_POST['name'];
$tmp[count($tmp)] = $_POST['adress'];
$tmp[count($tmp)] = $_POST['city'];
$tmp[count($tmp)] = $_POST['country'];
$tmp[count($tmp)] = $_POST['working_hours'];
$tmp[count($tmp)] = $_POST['contact'];
$tmp[count($tmp)] = $_POST['description'];

$tmp[count($tmp)] = '0'; //0 is admin id number
$tmp[count($tmp)] = $_POST['id']; //0 is admin id number

$a= new query_admin();

$a->set_insert_array( $tmp );
$a->update_kindergarden();