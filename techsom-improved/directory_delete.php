<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";

$sql = "delete from directory where id = '$data'";
$qry = $conn->query($sql);

?>