<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$dat = json_decode(file_get_contents("php://input"));
//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

global $connection;

$sql = "select * from cart_angular where id=$dat limit 1";

$result = mysqli_query($connection, $sql);

$data = array();

while($abshir = mysqli_fetch_array($result)){
    
    $data[] = $abshir;
    
}

echo json_encode($data);




//    


?>