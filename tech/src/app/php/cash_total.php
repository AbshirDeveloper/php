<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//$data = json_decode(file_get_contents("php://input"));


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakal');

global $connection;

$data = array();

$sql="SELECT sum(amount) as total FROM cash";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $sum = $row['total'];
}

$sq="SELECT sum(amount) as total FROM cash where status != 'Approved'";

$resul = mysqli_query($connection, $sq);

while ($ro = mysqli_fetch_assoc($resul)){
    $su = $ro['total'];
}

$sa="SELECT sum(amount) as total FROM cash where status = 'Approved'";

$resu = mysqli_query($connection, $sa);

while ($r = mysqli_fetch_assoc($resu)){
    $s = $r['total'];
}

$data = [$sum, $su, $s];

echo json_encode($data);





//    


?>