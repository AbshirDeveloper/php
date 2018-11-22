<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

$sql = "select * from expenses where id_customer != 'NULL'";
$qry = mysqli_query($connection, $sql);

while($res = mysqli_fetch_array($qry)){
    $data = $res;
}
echo json_encode($data);
?>