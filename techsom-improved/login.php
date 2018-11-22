<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("PHPMailer/PHPMailerAutoload.php");

//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

global $connection;

$data = json_decode(file_get_contents("php://input"));

 $email = $data->email;
 $password = $data->password;
 $hash_format = "$2y$10$";
$salt = "Salt22charactersormore";
$format_and_salt = $hash_format . $salt;
$hash = crypt($password, $format_and_salt);

$sql = "select * from login where email = '$email' and password = '$hash'";
$result = mysqli_query($connection, $sql);
while($real = mysqli_fetch_array($result)){
    $res = $real;
}

if($result){
    $success = true;
} else {
    $success = false;
}

echo json_encode($success);

?>