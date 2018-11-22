<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakal');
global $connection;

$dat = json_decode(file_get_contents("php://input"));
$time = time();

$sql = "update initial set date='$time', amount='$dat' where id=54";

if($dat != null){

$result = mysqli_query($connection, $sql);
}

?>