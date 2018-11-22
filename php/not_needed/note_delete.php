<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";

$sql = "delete from note where id = '$data'";
$qry = $conn->query($sql);

?>