<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
require_once("history_update.php"); 
global $connection;

$sql2 = "delete from cash where id = '$data'";
$qry2 = $conn->query($sql2);

$public->history_up('Cash Deletion', 0);

$conn->close();
?>