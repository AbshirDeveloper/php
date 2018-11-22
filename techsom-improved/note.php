<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("PHPMailer/PHPMailerAutoload.php");

//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

global $connection;

$dat = json_decode(file_get_contents("php://input"));

$time = time();

$sql = "insert into note (name, message, time) values ('$dat->name', '$dat->message', '$time')";

if($dat->name != null){

$result = mysqli_query($connection, $sql);
}


if($dat->name == 'Directory'){

$s = "select * from directory";
$res = mysqli_query($connection, $s);
    
} elseif ($dat->name == 'Dayn'){
$s = "select * from dayn";
$res = mysqli_query($connection, $s);  
    
} elseif($dat->name == 'Amaano'){
$s = "select * from amano where firstname != ''";
$res = mysqli_query($connection, $s);   
    
}

while($abshir = mysqli_fetch_array($res)){
    
$phone = $abshir['phone'];
    

    
$time = date('m/d/Y', time());

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = 'etawakalchi@gmail.com';
$im->FromName = 'Tawakal Chicago';
$im->AddReplyTo('7737472974@tmomail.net', 'Reply Address');
$im->addAddress($phone.'@tmomail.net');

$im->Subject = 'Tawakal Express:';
$im->Body = $dat->message;
$im->AltBody = $dat->message;

$placed = $im->send();
    
}


?>