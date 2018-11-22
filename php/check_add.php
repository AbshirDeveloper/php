<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
global $connection;
//include "db.php";
$today_real = time();
$sql = "INSERT INTO checks (date, customer, status, amount)
VALUES ('$today_real', '$data->name', 'Pending', $data->amount)";
if($data->name != null){
$qry = mysqli_query($connection, $sql);
    
$pertain = "New check registery for {$data->name}";
    
$public->history_up($pertain, $data->amount);

}

?>