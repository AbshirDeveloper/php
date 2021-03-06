<?php require_once("sessions.php"); ?>
<?php require_once("database.php");

class everything {
	
public static function password_encrypt($password) {
  	  $hash_format = "$2y$10$";   
	  $salt_length = 22; 					
	  $salt = static::generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
	  return $hash;
	}

public static function generate_salt($length) {
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  $base64_string = base64_encode($unique_random_string);
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  $salt = substr($modified_base64_string, 0, $length);
	  return $salt;
	}

public static function login(){
	if(!isset($_SESSION['name'])) {
		header ("location: ../data/logout.php");
}
}

public static function get_by_id($table, $id){
	global $connection;
	$query = "select * from {$table} where id = {$id}";
	$result = mysqli_query($connection, $query);
	while($array = mysqli_fetch_array($result))
	return $array;
}

public static function get_by_sql($sql){
	global $connection;
	$result = mysqli_query($connection, $sql);
	while($array = mysqli_fetch_array($result)){
	return $array;
	}
}
//works
public static function update($array, $table_name, $where_attribute, $where_value){
	global $connection;
	foreach($array as $attribute => $value) {
	$query = "update {$table_name} set {$attribute} = '{$value}' where {$where_attribute} = '{$where_value}'";
	$result = mysqli_query($connection, $query);
	return $result;
	}
}

//works
public static function delete($table_name, $where_attribute, $where_value){
	global $connection;
	$query = "delete from " . $table_name . " where " . $where_attribute . " = " . "'".$where_value."'";
	$result = mysqli_query($connection, $query);
	return $result;
}

//works
public static function insert($array, $table_name){
	global $connection;
	$keys = "(" . join(", ", array_keys($array)). ")";
	$values = "('" . join("', '", array_values($array)). "')";
	$query = "insert into " . $table_name . " " . $keys . " values " . $values;
	$result = mysqli_query($connection, $query);
	return $result;
}

//works
public static function select_all($table_name){
	global $connection;
	$query = "select * from " . $table_name;
	$result = mysqli_query($connection, $query);
	return $result;	
}

public static function select_finshing($table_name){
	global $connection;
	$query = "select * from {$table_name} where product_amount < 5";
	$result = mysqli_query($connection, $query);
	return $result;	
}

//works
public static function select_where($table_name, $attribute, $value){
	global $connection;
	$query = "select * from " . $table_name . " where " . $attribute . " = " . "'".$value."'";
	$result = mysqli_query($connection, $query);
	if($result){
		while($array = mysqli_fetch_array($result)){
	return $array;
	}
	}
	
}

public static function select_where_more($table_name, $attribute){
	global $connection;
	$query = "select * from " . $table_name . " where " . $attribute;
	$result = mysqli_query($connection, $query);
	$array = mysqli_fetch_array($result);
	return $array;
}

public static function select_sum_column($table, $column){
	global $connection;
	$query = "select sum({$column}) from {$table} limit 1";
	$result = mysqli_query($connection, $query);
	$string = mysqli_fetch_object($result);
	foreach ($string as $value) {
	return $value;
}
}

public static function update_single($table, $column_to_update, $new_value, $corresponding_column, $name){
	global $connection;
	$query = "update {$table} set {$column_to_update} = {$new_value} where {$corresponding_column} = '{$name}' limit 1";
	$result = mysqli_query($connection, $query);
	return $result;
}

public static function select_count($table){
	global $connection;
	$query = "select COUNT(*) FROM {$table}";
	$result = mysqli_query($connection, $query);
	$total = mysqli_fetch_array($result);
	return array_shift($total);

}

public static function offset($table, $number){
	global $connection;
	$query = "select * from {$table} limit 20  offset {$number}";
	$result = mysqli_query($connection, $query);
	return $result;
}


}

$public = new everything();

?>