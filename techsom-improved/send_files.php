<?php 
$connection = mysqli_connect('localhost', 'myuser', 'abshir26', 'etawakal');

//dayn


$query = "select * from dayn";

$result = mysqli_query($connection, $query);
$today = date("m-d-Y", time());

$file = "files/({$today} Dayn).csv";

$handler = fopen($file, 'w');
if($handler == true){
$array = array("Date", "Due Date", "Name", "Phone", "Amount", "Paid", "Balance");
fputcsv($handler, $array);	

while ($abshir = mysqli_fetch_array($result)){
	$date = date("m/d/Y", $abshir['date']);
	$due_date = date("m/d/Y", $abshir['due_date']);
	$list = array ($date, $due_date, $abshir['name'], $abshir['phone'], "$".$abshir['amount'], "$".$abshir['paid'], "$".$abshir['balance']);
    fputcsv($handler, $list);
}
}


//amano

$query_amano = "select * from amano where firstname != 'NULL'";

$result_amano = mysqli_query($connection, $query_amano);

$file_amano = "files/({$today} amano).csv";

$handler_amano = fopen($file_amano, 'w');
if($handler_amano == true){
$array_amano = array("Name", "Phone", "Balance");
fputcsv($handler_amano, $array_amano);	

while ($abshir_amano = mysqli_fetch_array($result_amano)){
    $full_name = $abshir_amano['firstname']." ".$abshir_amano['lastname'];
    
    $s = "select * from amano where customer_id = {$abshir_amano['id']}";
    $q = mysqli_query($connection, $s);
    while($r = mysqli_fetch_array($q)){
        $idbalance = "$".$r['idbalance'];
    }
    
	$list_amano = array ($full_name, $abshir_amano['phone'], $idbalance);
    fputcsv($handler_amano, $list_amano);
}
}


require_once("PHPMailer/PHPMailerAutoload.php");
 
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
$im->AddAttachment($file_amano);
$im->AddAttachment($file);
$im->addAddress('brotherabshir@gmail.com');

$im->Subject = "Tawakal Chicago:";
$im->Body = 'attachments';
//$im->AltBody = "Final Test";

$placed = $im->send(); 




?>
