<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "delete from cart_angular where id = '$data'";
$qry = $conn->query($sql);
?>