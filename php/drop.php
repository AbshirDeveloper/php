<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
global $connection;
//include "db.php";

$today_real = time();
$sql = "UPDATE drope
SET date='$today_real', amount='$data'
WHERE id=2 limit 1";
if($data != null){
$qry = mysqli_query($connection, $sql);
    
$public->history_up('Balance Drop', $data);  
    
}

?>