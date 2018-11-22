<?php

//require_once("data/combine.php");
require_once("PHPMailer/PHPMailerAutoload.php");

//if(isset($_GET['id'])){
//	$id = $_GET['id'];

//global $connection;
//
//$sql = "select * from dayn where phone = '{$id}' and id_customer = {$_SESSION['id']} limit 1";
//$result = mysqli_query($connection, $sql);
//while ($balance = mysqli_fetch_array($result)){
//
//$r_balance = preg_replace('/[^0-9]/s', '', $balance['balance']);



$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'noor@noortaxservice.com';
$im->Password = 'Zamzam#1632';
//$im->SMTPSecure = 'SSL';
$im->Port = 80;

$im->From = 'info@noortaxservice.com';
$im->FromName = 'Noor Tax Service';
$im->AddReplyTo('info@noortaxservice.com', 'Reply Address');
$im->addAddress('brotherabshir@gmail.com');

$im->Subject = "From: NoorTaxService:";
$im->Body = "Hello world";
$im->AltBody = "Hello world";

if(
$placed = $im->send()) {
    echo "success";
} else {
    echo "failed";
}

//if($placed){
//	header("location: Web/Xisaab.php?page=0");
//} else {
//	echo "This phone doesn't work";
//}
//}
//} elseif(isset($_GET['page'])){
//	$id = $_GET['page'];
//
//global $connection;
//
//$sql = "select * from dayn where phone = '{$id}' limit 1";
//$result = mysqli_query($connection, $sql);
//while ($balance = mysqli_fetch_array($result)){
//
//$r_balance = $balance['balance'];
//
//$im = new PHPMailer;
//$im->isSMTP();
//$im->SMTPAuth = true;
//// $im->SMTPDebug = 2;
//
//$im->Host = 'smtpout.secureserver.net';
//$im->Username = 'ajama26@techsom.info';
//$im->Password = 'Abshir@26';
//// $im->SMTPSecure = 'ssl';
//$im->Port = 80;
//
//$im->From = $_SESSION['company_email'];
//$im->FromName = $_SESSION['company_name'];
//$im->AddReplyTo('3124093514@tmomail.net', 'Reply Address');
//$im->addAddress($id.'@tmomail.net');
//
//$im->Subject = "From: {$_SESSION['company_name']}";
//$im->Body = "Fadlan ${$r_balance} iskasoo bixi";
//$im->AltBody = "Fadlan $".$r_balance. "iskasoo bixi";
//
//$placed = $im->send();
//
//if($placed){
//	header("location: Web/notes.php?page=0");
//} else {
//	echo "This phone doesn't work";
//}
//}
//}


?>