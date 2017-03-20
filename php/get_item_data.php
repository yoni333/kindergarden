<?php
session_start();

include('main.php');
include('database_world.php');



class full_item_data {
    
    private $_dbh;
    private $SQL;
    private $insert_search;
    private $results;
    
    public function __construct(){
        $db = DB_connection_world::getInstance();
        $this->_dbh = $db->getConnection();
    }
    
    private function selecet_query(){
        
         try {
            /*** The SQL SELECT statement ***/
           $results = $this->_dbh->query( $this->SQL );
           $this->results =[];
             while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                    $this->results[] = $row;
                }
            /*** close the database connection ***/
            $this->_dbh = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    public function get_search_list(){
        
        //TODO aproove the like condition
        $this->SQL = "SELECT * FROM kindergardens  WHERE id = '$this->insert_search';"  ;
        
        $this->selecet_query();
        return $this->results;
        
    }
    
    public function set_insert_search(  ){
        
        $valid =  false;
        if ( isset($_GET['id']) && !empty($_GET['id']) ) {
        
            $insert_search = $_GET['id'];
            
            if ( is_numeric($insert_search) ) {

                 $this->insert_search = $insert_search;
                  $valid =  true;

            } 
            
        }
        
        if ( !$valid) {
            
            $newURL = 'http://pupick.de/app-pupick/index.html';
                header('Location: '.$newURL);
              //  echo "you must insert string" ; 
            
            
                die();

           
            
        }
    }
    
} //end class



$full_item_data = new full_item_data();

$full_item_data->set_insert_search(  );


$kindergarden = $full_item_data->get_search_list();

$kindergarden = $kindergarden[0];

/*
header('Content-Type: application/json');
        echo json_encode( $list );
 * 
 */