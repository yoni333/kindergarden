<?php
session_start();

include('main.php');
include('database_world.php');

class LoginAccount {
    
    private $_dbh;
    private $SQL;
    private $url;
   
    private $results;
    private $params;
    
    public function __construct(){
        $db = DB_connection_world::getInstance();
        $this->_dbh = $db->getConnection();
        
        $this->url = "http://pupick.de/app-pupick/profile.html";
    }
    
    function get_params(){
        
      
        $email = $_POST['email'];
        $password = $_POST['password'];  
        
        $this->params = array ( 
          
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
    
     function check_email_exist(){
        
        //TODO aproove the like condition
        $this->SQL = "SELECT private_name,family_name ,email,password FROM users"
                . "  WHERE email = '" . $this->params['email'] . "';"   ;
             
        
        $this->selecet_query();
      
        
        if ( !empty( $this->results[0]['email'] )  ){
            //found mail - check password
         
            if ($this->results[0]['password'] === $this->params['password']){
              
                $this->success_login();
              
                
            } else {
                // if password incorrect
                $this->results =array( 'results'=>'fail');
                
            }
            
            
        } else {
            //didnt found email 
            $this->results =array( 'results'=>'fail');
            
        }
        return $this->results;
        
    }
    
    function update_query(){
     
             try {
                 
             $this->SQL = "update  users set  last_login_try = '" . date("Y-m-d G:i:s") ."' ;";
                                
                  //       echo  $this->SQL;   
            /*** The SQL Insert statement ***/
            $this->_dbh->query( $this->SQL );
            
            $this->response='update';
        } catch (PDOException $e) {
            echo $e->getMessage();
             $this->response = 'fail';
        }
      
    }
    
    function success_login(){
         
        $_SESSION['isLogin'] = 'login';
        $_SESSION['private_name'] = $this->results['private_name'];
        $_SESSION['family_name'] = $this->results['family_name'];
      
        $this->close_db();
        
        //for update query
        include('database_users.php');
         $db = DB_connection_user::getInstance();
        $this->_dbh = $db->getConnection();
        $this->update_query();
        $this->close_db();
       $this->response='we_login';
       
        
        
    }
    
    function close_db(){
         /*** close the database connection ***/
            $this->_dbh = null;
        
    }
    
    function get_response(){
        
           return $this->response ;
        
    }
    
    
    
} //end class



$LoginAccount = new LoginAccount();

$LoginAccount->get_params();
$LoginAccount->check_email_exist();


$LoginAccount->close_db();
$response = $LoginAccount->get_response();


header('Content-Type: application/json');
   echo json_encode( $response );