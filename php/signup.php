<?php
session_start();

include('main.php');
include('database_world.php');

class newAccount {
    
    private $_dbh;
    private $SQL;
   
    private $results;
    private $params;
    
    public function __construct(){
        $db = DB_connection_world::getInstance();
        $this->_dbh = $db->getConnection();
    }
    
    function get_params(){
        
        $private_name = $_POST['signup_first_name'];
        $family_name = $_POST['signup_last_name'];
        $email = $_POST['signup_email'];
        $password = $_POST['signup_password'];  
        
        if ( empty($private_name) || empty($email)){
            
              $this->response = 'fail';
              $this->close_db();
          

            header('Content-Type: application/json');
               echo json_encode(  $this->response );
               die();
        }
        
        $this->params = array ( 
            'private_name'=>$private_name , 
            'family_name'=>$family_name, 
            'email'=>$email, 
            'password'=>$password, 
            
            );
    }
    
    private function selecet_query(){
        
         try {
            /*** The SQL SELECT statement ***/
           $results = $this->_dbh->query( $this->SQL );
           $this->results =[];
             while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                    $this->results[] = $row;
                   
                }
           
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    
     function check_email_duplicate(){
        
        //TODO aproove the like condition
        $this->SQL = "SELECT email  FROM users"
                . "  WHERE email = '" . $this->params['email'] . "';"   ;
             
        
        $this->selecet_query();
        return $this->results;
        
    }
    
    function insert_query(){
        
        if ( empty($this->results)){
            
             try {
                 
             $this->SQL = "INSERT INTO users ( private_name , family_name , email , password , register_short_date)
                            VALUES ( '".$this->params['private_name']."' ,
                            '".$this->params['family_name']."' ,
                            '".$this->params['email']."' ,
                            '".$this->params['password']."' ,
                            '".date("Y-m-d")."' 
                                );";
                                
                  //       echo  $this->SQL;   
            /*** The SQL Insert statement ***/
            $this->_dbh->query( $this->SQL );
            
            $this->response='insert';
        } catch (PDOException $e) {
            echo $e->getMessage();
             $this->response = 'fail';
        }
        
            
            
        }else{
            
            
             $this->response = 'duplicate';
            
        }
        
        
        
    }
    
    function close_db(){
         /*** close the database connection ***/
            $this->_dbh = null;
        
    }
    
    function get_response(){
        
           return $this->response ;
        
    }
    
    
    
} //end class



$newAccount = new newAccount();

$newAccount->get_params();
$newAccount->check_email_duplicate();
$newAccount->insert_query();

$newAccount->close_db();
$response = $newAccount->get_response();


header('Content-Type: application/json');
   echo json_encode( $response );