<?php
session_start();

include('main.php');
include('database_world.php');

class live_search {
    
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
        $this->SQL = "SELECT id ,name , adress , city FROM kindergardens"
                . "  WHERE name LIKE '" . $this->insert_search . "%'" 
                . " or city LIKE  '" . $this->insert_search . "%'" ;
        
        $this->selecet_query();
        return $this->results;
        
    }
    
    public function set_insert_search( $insert_search ){
        
        if ( $insert_search !== '' ) {
            
             $this->insert_search = $insert_search;
       
            
        } else {
            echo "you must insert string" ; 
            die();
            
        }
       
    }
    
} //end class

$insert_search = $_POST['search'];

$live_search = new live_search();

$live_search->set_insert_search( $insert_search );

$list = $live_search->get_search_list();


header('Content-Type: application/json');
        echo json_encode( $list );