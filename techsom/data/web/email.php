<?php
require_once("../../PHPMailer/PHPMailerAutoload.php");


if(isset($_POST['order'])){

$product_name = $_POST['product_name'];
$product_store = $_POST['product_store'];
$memo = $_POST['memo'];

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
$im->FromName = 'customer';
$im->AddReplyTo('ajama26@techsom.info', 'Reply Address');
$im->addAddress('binugiir@gmail.com');

$im->Subject = 'Customer placed an order';
$im->Body = $product_name . "<br />" . $memo  ;
$im->AltBody = $memo;

$placed = $im->send();

if($placed){
	echo "order placed";
} else {
	echo "error occurred";
}
}

// 0	smtp.secureserver.net
// 10	mailstore1.secureserver.net
// POP	pop.secureserver.net
// IMAP	imap.secureserver.net
// SMTP	smtpout.secureserver.net

// You can call our hosting department 24/7 at 480-505-8877, or you can contact us again via chat by selecting the Web Hosting or WordPress option on Godaddy.com/Help.

?>