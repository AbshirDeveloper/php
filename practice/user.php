<?php require_once("database.php"); ?>

<?php

class user {
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	
	public static function find_all() {
		global $database;
		$mohamed = new self;
		$result = "select * from users";
		$result_object_array = $mohamed->find_by_sql($result);
		return $result_object_array;
	}
	
	public static function find_by_id($id) {
		global $database;
		$query = "select * from users where id = {$id}";
		$result = self::find_by_sql($query);
		return !empty($result) ? array_shift($result) : false;
		}
		
	
	public static function find_by_sql($sql) {
		global $database;
		$result = $database->query($sql);
		$object_array = array();
		while($user = $database->fetch_array($result)) {
		$object_array[] = user::instantiate($user);
		}
		return $object_array; 
	}
	private static function has_attribute($attribute) {
		$ibrahim = new self;
		$abshir = get_object_vars($ibrahim);
		return array_key_exists($attribute, $abshir);
		
	}
	
	private static function instantiate($array) {
		$kow = new self;
		foreach ($array as $attribute=>$data) {
			if($kow->has_attribute($attribute)) {
				$kow->$attribute = $data;
				
			}
		}
		return $kow;
		
	}
	
}

$user = new user();


?>