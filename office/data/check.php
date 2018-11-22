<?php require_once("../data/combine.php");

if($_POST['submit'] && $_POST['password'] === $_POST['confirm_password']) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];   
	$company_name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

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
	'username'   => $username,
	'password'   => $password
);

$result = $public->insert($array, 'login');

if($result){
	header ("Location: ../pages/register_success.php");
} else {
	header ("Location: ../pages/register.php");
}

?>