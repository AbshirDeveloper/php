<?php

require_once("initiate.php");

class MYSQLdatabase {
	
//this variable is declared so that it can only by privated to the class and the connection information is stored in it
	private $connection;
	
//this is created so that connection is emediately initiated	
	function __construct() {
		$this->open_connection();
	}

//this is the connection function that connects the entire database to mysql and it has error check as well
	public function open_connection() {
		$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_connect_errno()) {
			die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
		}
	}
	
//this function has not yet been constructed or called, but it will close the connection when we are done with it
	public function close_connection() {
		if(isset($this->connection)) {
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}

//this function takes a query string of mysql, sends it to the database and returns a result from the database and checks if result is returned, simple as that. 
	public function query($sql) {
		$result = mysqli_query($this->connection, $sql);
		$this->confirm_query($result);
		return $result;
	}

//this function is what helps the upper function to check if the result is returned from the database. 
	private function confirm_query($result) {
		if(!$result) {
			die("Database query failed.");
		}
	}

//this function makes sure that the string you are sending to mysql is readable by removing all the odd characters like (').
	public function escape_value($string) {
		$escaped_string = mysqli_real_escape_string($this->connection, $string);
		return $escaped_string;
	}

	
//this function simply fetches a result from mysql into an array	
	public function fetch_array($result_set) {
		return mysqli_fetch_array($result_set);
	}
	
//this function returns the number of raws in a result set
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}

//interestingly, this functino return the id of the last generated row in the database. you understood it
	public function insert_id() {
		return mysqli_insert_id($this->connection);
	}
	
//this function will tell you the number of affected rows after you made a query 
	public function affected_rows() {
		return mysqli_affected_rows($this->connection);
	}
	
	
		
	}

//be advised, you should always have this portion at the end of your page out of the class because it's the instantiation of the class
$database = new MYSQLdatabase();
$db =& $database;
?>