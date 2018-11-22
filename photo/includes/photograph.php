<?php require_once("initiate.php"); ?>
<?php

class photograph {
	protected static $table_name;
	
		
//this function will help you find everything from the database at one time if you need it. 
	public static function find_all() {
	//in here remember to globalize the database that you should be connected. 
		global $database;
		$all = "select * from photographs";
		$result_object_array = self::find_by_sql($all);
		return $result_object_array;
	}

	
//this function will find everything that is associated with an id that you provide	
	public static function find_by_id($id=0) {
		global $database;
		$by_id = ("select * from users where id = {$id}");
		$object_array = self::find_by_sql($by_id);
		return !empty($object_array) ? array_shift($object_array) : false;
	}
	
//thie function helps to find something from the database when you provide a string query to it. 
	public static function find_by_sql($sql="") {
		global $database;
		$object_array = array();
		$by_sql = $database->query($sql);
		while ($processed = $database->fetch_array($by_sql)){
			$object_array[] = self::instantiate($processed);
		}
		//in here remember to return the format because you're trying to get a single row of data by the id you provided. 
		return $object_array;
	}
	
	public static function authenticate($username, $password){
		global $database;
		$khadro = new self;
		$query = "select * from users where username = '{$username}' and password = '{$password}'";
		$abshir = $khadro->find_by_sql($query);
		return !empty($abshir) ? array_shift($abshir) : false;
	}
	
//the duty of this function is to project the full_name
	public function full_name() {
		echo $this->first_name . " " . $this->last_name;
	}
	
//this function will help the instantiate function to find all the objects in the class and get the ones that are identical to the array attributes.
	private	function has_attribute($raadi) {
		$somali = $this->attributes;
		return array_key_exists($raadi, $somali);
	}
	
//this function grabs those identified attributes that are identical to the ones int the database to assign them in respective to each other. 
	public static function instantiate($array) {
		$kow = new self;
		
		foreach ($array as $attribute=>$data) {
		
		if ($kow->has_attribute($attribute)) {
			$kow->$attribute = $data;
				
		}
		}
		return $kow;
	}
	
	protected function attributes(){
		get_object_vars($this);
	}
	
	public function create(){
		global $database;
		$sql = "insert into ".self::$table_name." (username, password, first_name, last_name) values (
		'{$database->escape_value($this->username)}', '{$database->escape_value($this->password)}', '{$database->escape_value($this->first_name)}', '{$database->escape_value($this->last_name)}')";
		
		if($database->query($sql)){
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
			
		}
		
		
	}
	
	public function update(){
		global $database;
		$sql = "update ".self::$table_name." set username = '{$database->escape_value($this->username)}', password = '{$database->escape_value($this->password)}', first_name = '{$database->escape_value($this->first_name)}', last_name = '{$database->escape_value($this->last_name)}' where id = '{$database->escape_value($this->id)}' ";
		if($database->query($sql)){
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
		
		
	}
	public function delete(){
		global $database;
		$sql = "delete from ".self::$table_name." where id = {$database->escape_value($this->id)} limit 1";
		$database->query($sql);
		//return ($database->affected_rows() == 1) ? true : false;	 	
	}
		
	}


	
}

?>