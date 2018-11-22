<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
global $connection;
//include "db.php";

$today_real = time();
$sql = "INSERT INTO cash (date, description, amount, status)
VALUES ('$today_real', '$data->description', $data->amount, 'off')";
if($data->description != null){
$qry = mysqli_query($connection, $sql);
    
$public->history_up('Cash Registry', $data->amount);  
    
}

?>