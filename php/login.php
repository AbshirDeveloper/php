<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("PHPMailer/PHPMailerAutoload.php");
require_once("history_update.php"); 

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
    $first = $real['first_name'];
    $last = $real['last_name'];
    $id = $real['id'];
    $status = $real['status'];
    $initial = $real['initial'];
    $who = $real['who'];
}

if($res){
    $success = [$first, $last, $id, $status, $initial, $who];
} else {
    $success = false;
}

echo json_encode($success);

?>