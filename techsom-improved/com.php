<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');
global $connection;

$dat = json_decode(file_get_contents("php://input"));

$test = "select * from directory where phone = '$dat->phone'";
$kow = mysqli_query($connection, $test);
$mid = mysqli_fetch_array($kow);

if(!$mid){

$time = time();

$sql = "insert into directory (name, phone) values ('$dat->name', '$dat->phone')";

if($dat->name != null){

$result = mysqli_query($connection, $sql);
}
    
    echo json_encode('success');
} else {
   echo json_encode('failed');
}
?>