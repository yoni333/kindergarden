<?php
session_start();
include('login_check.php');
include('query.php');



$name_of_inserter = $_SESSION['admin-name'];
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
$tmp[count($tmp)] = $name_of_inserter;
$tmp[count($tmp)] = '0';

$a= new query_admin();

$a->set_insert_array( $tmp );
$a->insert_kindergarden();