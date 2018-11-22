<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');
global $connection;

$sql2 = "delete from return_item where id = '$data'";
$qry2 = $conn->query($sql2);

$conn->close();
?>