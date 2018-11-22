<?php

require_once("PHPMailer/PHPMailerAutoload.php");

function testing($phone, $message){
require_once("history_update.php"); 
global $connection;
//class everything {

$sql = "select * from settings where id = 1";
$qry = mysqli_query($connection, $sql);
while($setting = mysqli_fetch_array($qry)){
    $sending = $setting['send'];
}
    
if($sending){  
$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
//$im->SMTPSecure = 'SSL';
$im->Port = 80;

$im->From = 'etawakalchi@gmail.com';
$im->FromName = 'Tawakal Chicago';
$im->AddReplyTo('etawakalchi@gmail.com', 'Reply Address');
$im->addAddress($phone.'@mms.att.net');

$im->Subject = "Tawakal Chicago:";
$im->Body = $message;
//$im->AltBody = "Final Test";

$placed = $im->send(); 
    
    
    
    
    
if(!$placed){
$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
//$im->SMTPSecure = 'SSL';
$im->Port = 80;

$im->From = 'etawakalchi@gmail.com';
$im->FromName = 'Tawakal Chicago';
$im->AddReplyTo('etawakalchi@gmail.com', 'Reply Address');
$im->addAddress($phone.'@tmomail.net');

$im->Subject = "Tawakal Chicago:";
$im->Body = $message;
//$im->AltBody = "Final Test";

$sent = $im->send();
    
    
    
    
    
if(!$sent){
$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
//$im->SMTPSecure = 'SSL';
$im->Port = 80;

$im->From = 'etawakalchi@gmail.com';
$im->FromName = 'Tawakal Chicago';
$im->AddReplyTo('etawakalchi@gmail.com', 'Reply Address');
$im->addAddress($phone.'@vtext.com');

$im->Subject = "Tawakal Chicago:";
$im->Body = $message;
//$im->AltBody = "Final Test";

$final = $im->send(); 
}
}
}
} 
?>