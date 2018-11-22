<?php
$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 
include "db.php";

$sql = "update settings set send = '$data'  where id = 1";
$qry = $conn->query($sql);

?>