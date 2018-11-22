<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";


require_once("history_update.php"); 

$waydiin = "select * from amano where id = '$data'";

$hel = mysqli_query($connection, $waydiin);

while($ibrahim = mysqli_fetch_array($hel)){
    $name_amano = $ibrahim['firstname']." ".$ibrahim['lastname']; 
    $amount = $ibrahim['r_balance'];
} 


$pertain = "deleted Account ({$name_amano})";


$sql = "delete from amano where id = '$data'";
$qry = $conn->query($sql);

$sql2 = "delete from amano where customer_id = '$data'";
$qry2 = $conn->query($sql2);


$public->history_up($pertain, $amount);

$conn->close();
?>