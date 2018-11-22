<?php

require_once("data/combine.php");
require_once("PHPMailer/PHPMailerAutoload.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];

global $connection;

$sql = "select * from dayn where phone = '{$id}' limit 1";
$result = mysqli_query($connection, $sql);
while ($balance = mysqli_fetch_array($result)){

$r_balance = $balance['balance'];

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = 'ajama26@techsom.info';
$im->FromName = 'Amal Express Chicago';
$im->AddReplyTo('6122032391@tmomail.net', 'Reply Address');
$im->addAddress($id.'@tmomail.net');

$im->Subject = 'From: Amal Express: Xasuusin Dayn';
$im->Body = "Fadlan ${$r_balance} iskasoo bixi";
$im->AltBody = "Fadlan $".$r_balance. "iskasoo bixi";

$placed = $im->send();

if($placed){
	header("location: Web/Xisaab.php?page=0");
} else {
	echo "This phone doesn't work";
}
}
} elseif(isset($_GET['page'])){
	$id = $_GET['page'];

global $connection;

$sql = "select * from dayn where phone = '{$id}' limit 1";
$result = mysqli_query($connection, $sql);
while ($balance = mysqli_fetch_array($result)){

$r_balance = $balance['balance'];

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = 'ajama26@techsom.info';
$im->FromName = 'Amal Express Chicago';
$im->AddReplyTo('6122032391@tmomail.net', 'Reply Address');
$im->addAddress($id.'@tmomail.net');

$im->Subject = 'From: Amal Express: Xasuusin Dayn';
$im->Body = "Fadlan ${$r_balance} iskasoo bixi";
$im->AltBody = "Fadlan $".$r_balance. "iskasoo bixi";

$placed = $im->send();

if($placed){
	header("location: Web/notes.php?page=0");
} else {
	echo "This phone doesn't work";
}
}
}


?>