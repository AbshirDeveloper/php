<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";

$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

global $connection;

$sql5 = "delete from dayn where id = $data";
$qry5 = mysqli_query($connection, $sql5); 

$conn->close();
?>