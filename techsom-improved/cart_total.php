<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//$data = json_decode(file_get_contents("php://input"));


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

global $connection;


$s="SELECT sum(quantity) as total FROM cart_angular";

$res = mysqli_query($connection, $s);

while ($r = mysqli_fetch_assoc($res)){
$s = $r['total'];
}

$sql="SELECT count(id) as total FROM cart_angular";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)){
$sum = $row['total'];
}

$sq="SELECT sum(total) as total FROM cart_angular";

$resul = mysqli_query($connection, $sq);

while ($ro = mysqli_fetch_assoc($resul)){
    $su = $ro['total'];
}

$data = [$sum, $su, $s]; 

echo json_encode($data);





//    


?>