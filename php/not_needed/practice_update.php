<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');
global $connection;

$sql = "INSERT INTO dayn (name, phone)
VALUES ('$data->magac', '$data->number')";
$qry = mysqli_query($connection, $sql);
?>