<?php require_once("../data/combine.php"); 

if(isset($_POST['register'])){
	$first = $_POST['first_name'];
	$last = $_POST['last_name'];
	$date = date("m/d/Y", time());
	global $id;
	$id = $_SESSION['id'];
	$phone = $_POST['phone'];
	
global $connection;

$sql = "insert into amano (id_customer, first_name, last_name, date, phone) values ({$id}, '{$first}', '{$last}', '{$date}', '{$phone}')";
$query = mysqli_query($connection, $sql);

require_once("../PHPMailer/PHPMailerAutoload.php");

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = $_SESSION['company_email'];
$im->FromName = $_SESSION['company_name'];
$im->AddReplyTo('3124093514@tmomail.net', 'Reply Address');
$im->addAddress($phone.'@tmomail.net');

$im->Subject = "From: {$_SESSION['company_name']}";
$im->Body = $first." kusoo dhowoow {$_SESSION['company_name']} amaano";
$im->AltBody = $first." kusoo dhowoow {$_SESSION['company_name']} amaano";

$placed = $im->send();


header("location: amano.php?page=0");
} else {

if(isset($_POST['deposit'])){
	$deposit = $_POST['amount'];
	$debit = 0;
	$balance = $deposit - $debit;
	$date = date("m/d/Y", time());
	$id_customer = $_GET['id'];
	$sql = "insert into amano (id_balance, deposit, debit, balance, date, customer_id) values ({$_SESSION['id']}, {$deposit}, {$debit}, {$balance}, '{$date}', {$id_customer})";
	$query = mysqli_query($connection, $sql);

	require_once("../PHPMailer/PHPMailerAutoload.php");

	$sql2 = "select * from amano where id = {$id_customer}";
	$query1 = mysqli_query($connection, $sql2);
	$result = mysqli_fetch_array($query1);

	$ask = "select sum(balance) from amano where customer_id = {$id_customer} limit 1";
	$jawaab = mysqli_query($connection, $ask);
	$string = mysqli_fetch_object($jawaab);
	foreach ($string as $value) {
	$balance_total = "$".$value;
	}

	$phone = $result['phone'];
	$name = $result['first_name'];

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
	$im->FromName = $_SESSION['company_name'];
	$im->AddReplyTo('3124093514@tmomail.net', 'Reply Address');
	$im->addAddress($phone.'@tmomail.net');

	$im->Subject = "From: {$_SESSION['company_name']}";
	$im->Body = $name." Waxaan kaa qabanay $".$deposit." ". "Fadlan lasoco Xisaabtaada";
	$im->AltBody = $name." Waxaan kaa qabanay $".$deposit." ". "waxaa baaqi ah ".$balance_total." Fadlan losoco xisaabtaada";

	$placed = $im->send();

	header("location: amano.php?page=0");
} elseif (isset($_POST['debit'])){
	$debit = $_POST['amount'];
	$deposit = 0;
	$balance = $deposit - $debit;
	$date = date("m/d/Y", time());
	$id_customer = $_GET['id'];
	$sql = "insert into amano (id_balance, deposit, debit, balance, date, customer_id) values ({$_SESSION['id']}, {$deposit}, {$debit}, {$balance}, '{$date}', {$id_customer})";
	$query = mysqli_query($connection, $sql);

	require_once("../PHPMailer/PHPMailerAutoload.php");

	$sql2 = "select * from amano where id = {$id_customer}";
	$query1 = mysqli_query($connection, $sql2);
	$result = mysqli_fetch_array($query1);

	$ask = "select sum(balance) from amano where customer_id = {$id_customer} limit 1";
	$jawaab = mysqli_query($connection, $ask);
	$string = mysqli_fetch_object($jawaab);
	foreach ($string as $value) {
	$balance_total =  "$".$value;
	}

	$phone = $result['phone'];
	$name = $result['first_name'];

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
	$im->FromName = $_SESSION['company_name'];
	$im->AddReplyTo('3124093514@tmomail.net', 'Reply Address');
	$im->addAddress($phone.'@tmomail.net');

	$im->Subject = "From: {$_SESSION['company_name']}";
	$im->Body = $name." Waxaad isticmaashay $".$debit." "."Fadlan lasoco Xisaabtaada";
	$im->AltBody = $name." Waxaad isticmaashay $".$debit." "."Waxaa baaqi ah ".$balance_total." Fadlan lasoco Xisaabtaada";

	$placed = $im->send();

	header("location: amano.php?page=0");
}
}

if(isset($_GET['page'])){
	$id = $_GET['page'];
	$sql = "DELETE FROM amano
	WHERE id={$id}";
	$query = mysqli_query($connection, $sql);
	header("location: amano.php?page=0");

} elseif(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$sql = "DELETE FROM amano
	WHERE id={$id} limit 1";
	$ins = "DELETE FROM amano WHERE customer_id={$id}";
	$query = mysqli_query($connection, $sql);
	$try = mysqli_query($connection, $ins);
	header("location: amano.php?page=0");
}
?>