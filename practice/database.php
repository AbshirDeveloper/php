<?php require_once("config.php");?>

<?php

class MYSQLdatabase {
	private $connection;
	
	public function __construct() {
		$this->db_connection();	
	}
	
	public function db_connection() {
		$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_connect_errno($this->connection)) {
			echo "Connection to the database failed" . mysqli_connect_error();
			
		} 
	}
	
	public function db_close() {
		if($this->connection) {
			mysqli_close($this->connection);
		}
	}
	
	public function query($sql){
		//$cleaned = $this->string_clean($sql);
		$result = mysqli_query($this->connection, $sql);
		$this->confirm_query($result);	
		return $result;
	}
	
	private function confirm_query($result){
		if(!$result){
			echo "query failed";
		} 
	}
	
	private function string_clean($value) {
		$cleaned_string = mysqli_real_escape_string($value);
		return $cleaned_string;
	}
	
	public function fetch_array($value){
		while ($fetched = mysqli_fetch_array($value)) {
		return $fetched;	
		}
			
		}
	
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}


	public function insert_id() {
		return mysqli_insert_id($this->connection);
	}
	

	public function affected_rows() {
		return mysqli_affected_rows($this->connection);
	}
		
	}
	


$database = new MYSQLdatabase();
$db =& $database;
?>