<?php 

require_once("PHPMailer/class.phpmailer.php");
require_once("PHPMailer/class.smtp.php");
require_once("PHPMailer/language/phpmailer.lang-ar.php");

$to_name = "Junk mail";
$to = "brotherabshir@gmail.com";
$subject = "Mail test at ". date("m/d/Y", time());
$message = "this is a test";
$message = wordwrap($message, 70);
$from_name = "Abshir Jama";
$from = "brotherabshir@gmail.com";

//php mail version 
$mail = new PHPMailer();

// $mail->IsSMTP();
// $mail->Host      = "smtp-relay.gmail.com";
// $mail->Port      = 587;
// $mail->SMTPAuth  = true;
// $mail->Username  = "brotherabshir@gmail.com";
// $mail->Password  = "Abshir55";

$mail->FromName = $from_name;
$mail->From     = $from;
$mail->AddAddress($to, $to_name);
$mail->Subject  =$subject;
$mail->Body     =$message;


//$result = mail($to, $subject, $message, $headers);
$result = $mail->Send();
echo $result ? 'Sent' : 'Error';

?>