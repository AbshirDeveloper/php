<?php require_once("combine.php");

if($_POST['submit'] && $_POST['password'] === $_POST['confirm_password']) {

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];   
	$company_name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$bussines = $_POST['option'];
	$zip_code = $_POST['zip_code'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	

} else {
	header ("Location: ../pages/register.php");
}
?>

<?php

$array = array(
	'first_name' => $first_name,
	'last_name'  => $last_name,
	'company_name' => $company_name,
	'address' => $address,
	'phone' => $phone, 
	'password'   => $password,
	'business' => $bussines,
	'email' => $email,
	'city'  => $city,
	'zip_code' => $zip_code,
	'status' => "confirming"
);

global $connection;
$query 	= "select * from login where email = '{$email}' limit 1";
$real = mysqli_query($connection, $query);
$first = mysqli_fetch_array($real);
if($first){
	header ("Location: ../register.php?id=email_error");
} else {
$result = $public->insert($array, 'login');
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

$im->From = 'ajama26@techsom.info';
$im->FromName = 'Techsom';
$im->AddReplyTo('ajama26@techsom.info', 'Reply Address');
$im->addAddress($email);

global $connection;
	
$query = "select * from login where email = '{$email}'";
$result = mysqli_query($connection, $query);

$array = mysqli_fetch_array($result);

$im->Subject = 'Techsom New Account Confirmation';
$im->Body = "Thanks for regitering with techsom, please click this link http://techsom.info/pending.php?confirm={$array['id']}";
$im->AltBody = "Thanks for regitering with techsom, please click this link http://techsom.info/pending.php?confirm={$array['id']}";

$placed = $im->send();
	header ("Location: ../pending.php?con=1");
} 
?>