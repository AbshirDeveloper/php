<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

$dat = json_decode(file_get_contents("php://input"));


if($dat->one){
$password = $dat->pass;
$email = $dat->email;

		$hash_format = "$2y$10$";
		$salt = "Salt22charactersormore";
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);

global $connection;

$sql3 = "update login set password = '$hash' where email = '$email'";
$done = mysqli_query($connection, $sql3);

//$sql4 = "UPDATE login SET reset = NULL WHERE id = $dat->";
//$done4 = mysqli_query($c
     
    
} else {
$password = $dat->password;
$email = $dat->email;

		$hash_format = "$2y$10$";
		$salt = "Salt22charactersormore";
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);

global $connection;

$sql3 = "update login set password = '$hash' where email = '$email'";
$done = mysqli_query($connection, $sql3);

//$sql4 = "UPDATE login SET reset = NULL WHERE id = $dat->";
//$done4 = mysqli_query($c
     
}
?>