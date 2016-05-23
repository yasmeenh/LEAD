<?php

class Database {
	private $connect_db;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "lead2";
	


	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {
		$this->connect_db = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->connect_db;
	}

	public function getConnect()
	{
		return $connect_db;
	}
}
?>