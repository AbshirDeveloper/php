<?php 

require_once("../connect.php");
require_once("PHPMailer/PHPMailerAutoload.php");


if(isset($_POST['email'])){
	$name = $_POST['userName'];
	$email = $_POST['userEmail'];
	$phone = $_POST['userPhone'];
	$message = $_POST['userMsg'];		

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
$im->FromName = 'Techsom';
$im->AddReplyTo('ajama26@techsom.info', 'Reply Address');
$im->addAddress($email);

$im->Subject = 'Thanks for the contact';
$im->Body = "Hi {$name}, Thank you for contacting us (Hogol Releife Organization), we will respond to you as soon as possible insha allah";
$im->AltBody = "Hi {$name}, Thank you for contacting us (Hogol Releife Organization), we will respond to you as soon as possible insha allah";

$placed = $im->send();

header("location: ../contact.php?id=sent");

}
?>