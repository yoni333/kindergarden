<?php
session_start();

include('login_check.php');
include('database_connection.php');

class query_admin {
    
    private $_dbh;
    private $SQL;
    private $insert_array;
    private $results;
    
    public function __construct(){
        $db = DB_connection::getInstance();
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
    public function get_kindergarden_list(){
    
        $this->SQL = "SELECT * FROM kindergardens";
        $this->selecet_query();
        return $this->results;
        
    }
    
    public function set_insert_array( $insert_array ){
        
        if ( is_array($insert_array) ) {
            
             $this->insert_array = $insert_array;
       
            
        } else {
            echo "you must insert array" ; 
            die();
            
        }
       
    }
    
    public function insert_kindergarden(){
    
        $this->SQL = "INSERT INTO kindergardens ( `activate`,`name`, `adress` , `city`, `country`, `working_hours`, `contact` , `description`, `google_maps`, `inserted_by_name`, `inserted_by_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->_dbh->prepare( $this->SQL );
            
      echo $this->SQL;
        
        
        

            // initialise an array for the results 
            
            if  ( $stmt->execute(  $this->insert_array ) ) {
                
            } else { 
                
                echo "failed" ; 
                
            }
    }
    
    public function update_kindergarden(){
    
         $this->SQL = " UPDATE kindergardens
            SET activate=?,
                name=?,
                adress=?,
                city=?,
                country=?,
                working_hours=?,
                contact=?,
                description=?,
                google_maps=?,
                editBy=?
              
WHERE id=?;";
        
         
        $stmt = $this->_dbh->prepare( $this->SQL );
            
      echo $this->SQL;
      print_r($this->insert_array); 
        
        
        

            // initialise an array for the results 
            
            if  ( $stmt->execute(  $this->insert_array ) ) {
                
            } else { 
                
                echo "failed" ; 
                
            }
    }
    
} //end class
