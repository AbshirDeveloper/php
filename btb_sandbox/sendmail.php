<?php

	// Include the PHPMailer classes
	// If these are located somewhere else, simply change the path.
	require_once("phpMailer/class.phpmailer.php");
	require_once("phpMailer/class.smtp.php");
	
	
	// mostly the same variables as before
	// ($to_name & $from_name are new, $headers was omitted) 
	$to_name = "Junk mail";
	$to = "brotherabshir@gmail.com";
	$subject = "Mail Test at ".strftime("%T", time());
	$message = "This is a test.";
	$message = wordwrap($message,70);
	$from_name = "Abshir Jama";
	$from = "brotherabshir@gmail.com";
	
	// PHPMailer's Object-oriented approach
	$mail = new PHPMailer();
	
	// Can use SMTP
	// comment out this section and it will use PHP mail() instead
	$mail->IsSMTP();
	$mail->Host     = "aspmx.l.google.com";
	$mail->Port     = 25;
	$mail->SMTPAuth = false;
	$mail->Username = "brotherabshir@gmail.com";
	$mail->Password = "Abshir55";
	
	// Could assign strings directly to these, I only used the 
	// former variables to illustrate how similar the two approaches are.
	$mail->FromName = $from_name;
	$mail->From     = $from;
	$mail->AddAddress($to, $to_name);
	$mail->Subject  = $subject;
	$mail->Body     = $message;

	$mail->AddAttachment("examples/images/phpmailer.png");      // attachment
	$result = $mail->Send();
	echo $result ? 'Sent' : 'Error' . $mail->ErrorInfo;
  
?>