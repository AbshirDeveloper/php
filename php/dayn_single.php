<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("history_update.php"); 

$dat = json_decode(file_get_contents("php://input"));
global $connection;

$data = array();

$sql = "select * from dayn where id = $dat limit 1";
    $result = mysqli_query($connection, $sql);
while($abshir = mysqli_fetch_array($result)){
    $data[] = $abshir;
}


echo json_encode($data);




//    


?>