<?php require_once('../connect.php');


if(isset($_POST['create'])){

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['reg_pass'];  
	$phone = $_POST['phone'];
	
	$hash_format = "$2y$10$";
	$salt = "Salt22charactersormore";
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	
	$email = $_POST['reg_email'];

?>

<?php

$array = array(
	'first_name' => $first_name,
	'last_name'  => $last_name,
	'password'   => $hash,
	'phone' => $phone, 
	'email' => $email,
	'status' => "Active"
);

global $connection;
$query 	= "select * from member where email = '{$email}' limit 1";
$real = mysqli_query($connection, $query);
$first = mysqli_fetch_array($real);
if($first){
	header ("Location: member_list.php?id=email_error");
} else {
$table_name = "member";
	$keys = "(" . join(", ", array_keys($array)). ")";
	$values = "('" . join("', '", array_values($array)). "')";
	$query = "insert into " . $table_name . " " . $keys . " values " . $values;
	$result = mysqli_query($connection, $query);
	
require_once("PHPMailer/PHPMailerAutoload.php");

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

$im->Subject = 'Hogol New Member Confirmation';
$im->Body = "Thank you for becoming a valued Hogol member, we deeply appreciate your intrest of helping our somali people.";
$im->AltBody = "Thank you for becoming a valued Hogol member, we deeply appreciate your intrest of helping our somali people.";

$placed = $im->send();
	header ("Location: index.php?id=confirm");
} 
}elseif(isset($_POST['login'])){
	header("location: index.php");
}

?>