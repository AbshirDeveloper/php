<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakalchi');
require_once("PHPMailer/PHPMailerAutoload.php");
global $connection;

$sql = "select * from checks where status = 'Deposited'";

$result = mysqli_query($connection, $sql);


while($abshir = mysqli_fetch_array($result)){

$phone = $abshir['phone'];
    
$sq="SELECT sum(amount) as total FROM checks where id = {$abshir['id']}";

$resul = mysqli_query($connection, $sq);

while ($row = mysqli_fetch_assoc($resul)){
    $sum = $row['total'];
}
    
$s "SELECT COUNT(*) as total FROM checks where id={$abshir['id']}";   
    
$resu = mysqli_query($connection, $s);

while ($ro = mysqli_fetch_assoc($resu)){
    $number = $ro['total'];
}    
    

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

$im->From = 'etwakalchi@gmail.com';
$im->FromName = 'Tawakal Chicago';
$im->AddReplyTo('6122032391@tmomail.net', 'Reply Address');
$im->addAddress($phone.'@tmomail.net');

$im->Subject = 'From: Tawakal Express: Xasuusin Check';
$im->Body = "Fadlan ogow waxaad hadda deposit garaynaynaa ".$number." check(s) oo aad leedahay. Totalkuna uu yahay $".$sum." maanta oo taariikhkdu tahay {$time}";
$im->AltBody = "Fadlan ogow waxaad hadda deposit garaynaynaa ".$number." check(s) oo aad leedahay. Totalkuna uu yahay $".$sum." maanta oo taariikhkdu tahay {$time}";

    
  
$placed = $im->send();    
    
    
}




//    


?>