<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//$data = json_decode(file_get_contents("php://input"));
require_once("history_update.php"); 

global $connection;

$data = array();

$sql="SELECT sum(amount) as total FROM cash where status != 'staged'";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $sum = $row['total'];
}

$date = time() - 86400;
$sq="SELECT sum(amount) as total FROM cash where date > $date";

$resul = mysqli_query($connection, $sq);

while ($ro = mysqli_fetch_assoc($resul)){
    $su = $ro['total'];
}

$data = [$sum, $su];

echo json_encode($data);





//    


?>