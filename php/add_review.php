<?php
session_start();

include('main.php');

print_r($_SESSION);
include('isLogin.php');


 include('database_users.php');
 
 print_r($_POST);
  
 
class addReview {
    
    private $_dbh;
    private $SQL;
    private $url;
   
    private $results;
    private $params;
    
    public function __construct(){
        $db = DB_connection_user::getInstance();
        $this->_dbh = $db->getConnection();
        
        $this->url = "http://pupick.de/app-pupick/profile.html";
    }
    
    function get_params(){
        
      
        $kindergardenID = $_POST['kindergardenID'];
        $text = $_POST['text'];  
        $userID = $_SESSION['userID'];
        
          if ( empty($kindergardenID) || empty($text)){
            
              $this->response = 'fail';
              $this->close_db();
          

            header('Content-Type: application/json');
               echo json_encode(  $this->response );
               die();
        }
        
        
        $this->params = array ( 
          
            'kindergardenID'=>$kindergardenID, 
            'text'=>$text, 
            'userID'=>$userID, 
            
            );
    }
  
    public function insert_review(){
    
        $this->SQL = "INSERT INTO feedbacks ( `user_id`,`kindergardem_id`, `feddback` )"
                . "  VALUES (:user_id,:kindergardenID,:text)";
        $stmt = $this->_dbh->prepare( $this->SQL );
            
      echo $this->SQL;
        
        $stmt->bindParam(':user_id',  $this->params['userID']);
      $stmt->bindParam(':kindergardenID',  $this->params['kindergardenID']);
        $stmt->bindParam(':text',  $this->params['text']);
        

            // initialise an array for the results 
            
            if  ( $stmt->execute(  ) ) {
                
            } else { 
                
                echo "failed" ; 
                
            }
    }
    
   
    
    function success_login(){
         
        $_SESSION['isLogin'] = 'login';
        $_SESSION['private_name'] = $this->results['private_name'];
        $_SESSION['family_name'] = $this->results['family_name'];
        //TODO get user id
       // $_SESSION['userID'] = $this->results['id'];
      
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



$addReview = new addReview();

$addReview->get_params();
$addReview->insert_review();


$addReview->close_db();
$response = $addReview->get_response();


header('Content-Type: application/json');
   echo json_encode( $response );