<?php
session_start();
include('login_check.php');
include('query.php');



$a= new query_admin();


$list = $a->get_kindergarden_list();

foreach ($list as $key => $value ){
    
    
    $list[$key]['edit_garden_row'] = "<button class='btn btn-default adminEditGardenBtn' data-editGarden='" . $value['id']. "' >Edit</button>";
   // $list[$key]['hide'] = "<button class='btn btn-default'  data-hideGarden='$key'  >hide</button>";
    
}


header('Content-Type: application/json');
        echo json_encode( $list );