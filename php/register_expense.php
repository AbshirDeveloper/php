<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
global $connection;


$today_real = time();
$sql = "insert into expenses (date, description) values ('$today_real', '$data->description')";

if($data->description){
$qry = mysqli_query($connection, $sql);
    
$jaw = "success";
 echo json_encode($jaw); 
}
?>