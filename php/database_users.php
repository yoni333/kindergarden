<?php
session_start();

include('main.php');
include('isLogin.php');

/*
* Mysql database class - only one connection alowed
*/
class DB_connection_user {
    
	private $_connection;
	private static $_instance; //The single instance
	private $servername = "localhost";
	private $username = "webkoinf_pupickU";
	private $password = "}hdWqVPq%ym{";
	private $database = "webkoinf_pupick";
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {
		try {
                    $this->_connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
                    // set the PDO error mode to exception
                    $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e)
                    {
                    echo "Error: " . $e->getMessage();
                
                    }
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}
?>