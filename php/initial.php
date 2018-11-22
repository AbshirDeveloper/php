<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("history_update.php"); 

global $connection;

$dat = json_decode(file_get_contents("php://input"));
$time = time();

$sql = "select * from initial";

$qr = mysqli_query($connection, $sql);

$result = mysqli_fetch_array($qr);

if($result){ 

$sql = "update initial set date='12345', amount='$dat' where date='12345'";

if($dat != null){

$result = mysqli_query($connection, $sql);
}
    
} else {
$sql = "insert into initial (date, amount) values ('12345', $dat)";

$qr = mysqli_query($connection, $sql);
}

?>