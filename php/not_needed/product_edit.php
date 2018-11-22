<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

global $connection;

$sql = "select * from product_list where id = $data";

$result = mysqli_query($connection, $sql);

//$dat = array();

while($abshir = mysqli_fetch_array($result)){
    
    $dat = $abshir;
    
}

echo json_encode($dat);





//    


?>