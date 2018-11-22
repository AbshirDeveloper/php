<?php

require_once("../PHPMailer/PHPMailerAutoload.php");

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
$im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = 'ajama26@techsom.info';
$im->FromName = 'Abshir Jama';
$im->AddReplyTo('ajama26@techsom.info', 'Reply Address');
$im->addAddress('brotherabshir@gmail.com');

$im->Subject = 'This is a test';
$im->Body = 'This is the body of an email';
$im->AltBody = 'This is the body as well';

var_dump($im->send());


// 0	smtp.secureserver.net
// 10	mailstore1.secureserver.net
// POP	pop.secureserver.net
// IMAP	imap.secureserver.net
// SMTP	smtpout.secureserver.net

// You can call our hosting department 24/7 at 480-505-8877, or you can contact us again via chat by selecting the Web Hosting or WordPress option on Godaddy.com/Help.

?>