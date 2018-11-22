<?php
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
global $connection;
include "db.php";

$s = "select * from dayn where id = '$data'";
$q = $conn->query($s);
while($r = mysqli_fetch_array($q)){
    $name = $r['name'];
    $pertain = "Deleted ".$name." dayn balance";
}


$sql = "delete from amano where id = '$data'";
$qry = $conn->query($sql);

$sql2 = "delete from dayn where id = '$data'";
$qry2 = $conn->query($sql2);

$public->history_up($pertain, 0);

$conn->close();
?>