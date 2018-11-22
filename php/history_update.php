<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("header.php"); 
global $connection;


class everything {
    
    
//login
	
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
    header ("location: ../index.html");
}
}
  
    
public static function temp_login_check(){
	if(!isset($_SESSION['name'])){
    header("location: ../wrong.html");
	}
}
    
//read
    
public static function select_all($table_name){
	global $connection;
	$query = "select * from " . $table_name;
	$result = mysqli_query($connection, $query);
	return $result;	
}

public static function get_by_id($table, $attribute, $id){
	global $connection;
	$query = "select * from {$table} where {$attribute} = {$id}";
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

public static function select_sum_column($table, $column){
	global $connection;
	$query = "select sum({$column}) from {$table}";
	$result = mysqli_query($connection, $query);
	$string = mysqli_fetch_object($result);
	foreach ($string as $value) {
	return $value;
}
}

public static function select_sum_column_where_id($table, $column, $id){
	global $connection;
	$query = "select sum({$column}) from {$table} where id = {$id} limit 1";
	$result = mysqli_query($connection, $query);
	$string = mysqli_fetch_object($result);
	foreach ($string as $value) {
	return $value;
}
}
    
    
    
public static function select_sum_column_where_idcustomer($table, $column, $id){
	global $connection;
	$query = "select sum({$column}) from {$table} where id_customer = {$id} limit 1";
	$result = mysqli_query($connection, $query);
	$string = mysqli_fetch_object($result);
	foreach ($string as $value) {
	return $value;
}
} 
    
public static function select_count($table){
	global $connection;
	$query = "select COUNT(*) FROM {$table}";
	$result = mysqli_query($connection, $query);
	$total = mysqli_fetch_array($result);
	return array_shift($total);
}    

public static function select_count_idcustomer($table, $id){
	global $connection;
	$query = "select COUNT(*) FROM {$table} where id_customer = {$id}";
	$result = mysqli_query($connection, $query);
	$total = mysqli_fetch_array($result);
	return array_shift($total);
}
    
    
public static function select_count_id($table, $id){
	global $connection;
	$query = "select COUNT(*) FROM {$table} where id = {$id}";
	$result = mysqli_query($connection, $query);
	$total = mysqli_fetch_array($result);
	return array_shift($total);
}   
    
//update
public static function update($query){
	global $connection;
	foreach($array as $attribute => $value) {
	$result = mysqli_query($connection, $query);
	return $result;
	}
}


//delete (tested)
public static function delete($query){
	global $connection;
	$result = mysqli_query($connection, $query);
	return $result;
}
    
public static function delete_both($query, $query2){
	global $connection;
	$result = mysqli_query($connection, $query);
    $result2 = mysqli_query($connection, $query2);
	return $result;
}

//create
public static function insert($query){
	global $connection;
	$result = mysqli_query($connection, $query);
	return $result;
}
    
    
    
public static function history_up($pertain, $amount){
global $connection;
    
$three = 60*60*24*3;
$three_days = time() - $three;

$delete_older = "delete from histor where time < $three_days";  
$delete_result = mysqli_query($connection, $delete_older);   
    
$sql_amano = "select sum(r_balance) as total from amano";
    $result_amano = mysqli_query($connection, $sql_amano);
while ($row_amano = mysqli_fetch_assoc($result_amano)){
    $sum_amano = $row_amano['total'];
}

$sql_expense = "select sum(r_balance) as total from expenses";
    $result_expense = mysqli_query($connection, $sql_expense);
while ($row_expense = mysqli_fetch_assoc($result_expense)){
    $sum_expense = $row_expense['total'];
}

$sql_amano_office = "select sum(r_balance) as total from amano where type='office'";
    $result_amano_office = mysqli_query($connection, $sql_amano_office);
while ($row_amano_office = mysqli_fetch_assoc($result_amano_office)){
    $sum_amano_office = $row_amano_office['total'];
}

$sql_dayn = "select sum(balance) as total from dayn";
    $result_dayn = mysqli_query($connection, $sql_dayn);
while ($row_dayn = mysqli_fetch_assoc($result_dayn)){
    $sum_dayn = $row_dayn['total'];

}


$sql_cash = "select sum(amount) as total from cash where status != 'Approved'";
    $result_cash = mysqli_query($connection, $sql_cash);
while ($row_cash = mysqli_fetch_assoc($result_cash)){
    $sum_cash = $row_cash['total'];

}

$sql_initial = "select sum(amount) as total from initial";
    $result_initial = mysqli_query($connection, $sql_initial);
while ($row_initial = mysqli_fetch_assoc($result_initial)){
    $sum_initial = $row_initial['total'];

}

$sql_drop = "select sum(amount) as total from drope";
    $result_drop = mysqli_query($connection, $sql_drop);
while ($row_drop = mysqli_fetch_assoc($result_drop)){
    $sum_drop = $row_drop['total'];
}


$sql_check_pending = "select sum(amount) as total from checks where status = 'Pending'";
    $result_check_pending = mysqli_query($connection, $sql_check_pending);
while ($row_check_pending = mysqli_fetch_assoc($result_check_pending)){
    $sum_check_pending = $row_check_pending['total'];
}

$sql_check_approved = "select sum(amount) as total from checks where status = 'Approved'";
    $result_check_approved = mysqli_query($connection, $sql_check_approved);
while ($row_check_approved = mysqli_fetch_assoc($result_check_approved)){
    $sum_check_approved = $row_check_approved['total'];

}

$sql_check_deposited = "select sum(amount) as total from checks where status = 'staged'";
    $result_check_deposited = mysqli_query($connection, $sql_check_deposited);
while ($row_check_deposited = mysqli_fetch_assoc($result_check_deposited)){
    $sum_check_deposited = $row_check_deposited['total'];

}
  
    
$time = time();    
$totale = -$sum_initial + $sum_dayn + $sum_drop - $sum_amano - $sum_amano_office + $sum_cash + $sum_check_pending + $sum_check_deposited - $sum_check_approved + $sum_expense;    
    
    
$sq = "INSERT INTO histor (time, pertain, status, transaction, new_balance)
VALUES ('$time', '$pertain', 'Unknown', $amount, $totale)";     
    
$qr = mysqli_query($connection, $sq); 
    
$history_change = "SELECT * FROM histor ORDER BY id DESC LIMIT 1 OFFSET 70";
$histor_res = mysqli_query($connection, $history_change);
while($ress = mysqli_fetch_array($histor_res)){
    $sql = "delete from histor where id < {$ress['id']}";
    $res = mysqli_query($connection, $sql);
}
    
}    
    
}



$public = new everything();


?>