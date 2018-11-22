<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("history_update.php"); 

global $connection;

$sql = "select * from expenses where description != 'NULL' order by id desc";

$result = mysqli_query($connection, $sql);

$data = array();

while($abshir = mysqli_fetch_array($result)){
    
    $data[] = $abshir;
    
}

echo json_encode($data);





//    


?>