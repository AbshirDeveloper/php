<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//$data = json_decode(file_get_contents("php://input"));


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

global $connection;

$data = array();

$sql="SELECT sum(amount) as total FROM checks where status = 'Deposited'";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $sum = $row['total'];
}

$query = "SELECT count(*) as total from checks where status = 'Deposited'";

$res = mysqli_query($connection, $query);

while ($da = mysqli_fetch_assoc($res)){
    $totale = $da['total'];
}

$data = [$sum, $totale];
echo json_encode($data);

//    


?>