<?php
/*
* PDO database class - only one connection allowed
*/
class Database {
	private $connection;
	private static $instance; //The single instance
	private $host = "localhost";//use your db hostname
	private $user = "root";// use your db username
	private $pass = "";//use your db password
	private $db = "test";//use your db name
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$instance) { // If no instance then make one
			self::$instance = new self();
		}
		return self::$instance;
	}
	// Constructor
	private function __construct() {
		$this->connection =  new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->connection;
	}
}
?>