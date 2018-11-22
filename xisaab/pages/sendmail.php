
	<?php require_once('phpMailer/class.phpmailer.php'); ?>
	<?php require_once('phpMailer/class.smtp.php'); ?>
	<?php require_once('phpMailer/language/phpmailer.lang-en.php'); ?>
	

	<?php

	if(isset($_POST['send'])){
	// mostly the same variables as before
	// ($to_name & $from_name are new, $headers was omitted) 
	$to_name = 'Important';
	$to = 'brotherabshir@gmail.com';
	$subject = $_POST['title'];
	$message = $_POST['note'];
	$from_name = 'Abshir Jama';
	$from = 'brotherabshir@gmail.com';
	
	// PHPMailer's Object-oriented approach
	$mail = new PHPMailer();
		

	if(isset($_POST['cc'])){
		$cc = $_POST['cc'];
		$name = $_POST['name'];
		$mail->AddCC($cc, $name);
	}
	
	$mail->AddReplyTo('brotherabshir@gmail.com', 'Abshir Jama');
	//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

	// Can use SMTP
	// comment out this section and it will use PHP mail() instead
	$mail->IsSMTP();
	$mail->Host     = 'aspmx.l.google.com';
	$mail->Port     = 25;
	$mail->SMTPAuth = false;
	$mail->Username = 'brotherabshir@gmail.com';
	$mail->Password = 'Abshir55';
	
	// Could assign strings directly to these, I only used the 
	// former variables to illustrate how similar the two approaches are.
	$mail->FromName = $from_name;
	$mail->From     = $from;
	$mail->AddAddress($to, $to_name);
	$mail->Subject  = $subject;
	$mail->Body     = $message;

	$mail->AddAttachment($_FILES['file_upload']['tmp_name'],
                         $_FILES['file_upload']['name']);      // attachment
	$result = $mail->Send();
	if($result){
		header("location: home.php");
	} else {
		echo 'Error' . $mail->ErrorInfo . "<br />";
		?><a href="home.php"><--Back to Home Page</a>
		<?php
	}
	}
	
?>