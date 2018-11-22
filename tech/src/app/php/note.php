<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakal');
global $connection;

$dat = json_decode(file_get_contents("php://input"));
$time = time();

$sql = "insert into note (name, message, time) values ('$dat->name', '$dat->message', '$time')";

if($dat->name != null){

$result = mysqli_query($connection, $sql);
}

?>