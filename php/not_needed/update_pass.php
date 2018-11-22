<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("PHPMailer/PHPMailerAutoload.php");

//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');

global $connection;

//$data = json_decode(file_get_contents("php://input"));

 $email = 'etawakalchi@gmail.com';
 $password = 'etawakal';
 $salt = "Salt22charactersormore";
 $pw_hash = md5($salt.$password);
$sql = "update login set email = '$email', password = '$pw_hash'";
$result = mysqli_query($connection, $sql);

if($result){
    echo 'success';
} else {
    echo 'failed';
}
?>