<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "truncate cart_angular";
$qry = $conn->query($sql);
?>