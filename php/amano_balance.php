<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
require_once("history_update.php"); 

$dat = json_decode(file_get_contents("php://input"));

global $connection;

$data = array();

$sql = "select * from amano where customer_id = $dat order by id desc";
    $result = mysqli_query($connection, $sql);
while($abshir = mysqli_fetch_array($result)){
    $data[] = $abshir;
}


echo json_encode($data);




//    


?>