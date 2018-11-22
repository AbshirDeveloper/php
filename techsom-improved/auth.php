<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


//$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'xafiis');
$connection = mysqli_connect('localhost', 'abshir', 'abshir26', 'etawakalchi');

$dat = json_decode(file_get_contents("php://input"));

global $connection;
		$password = $dat->password;
		
		$hash_format = "$2y$10$";
		$salt = "Salt22charactersormore";
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);


$sql = "select * from login where email = '$dat->username' and password='$hash' limit 1";
    $result = mysqli_query($connection, $sql);
while($abshir = mysqli_fetch_array($result)){

    if($abshir){
        $data = $abshir['id_unique'];
    } else {
        $data = 'failed';
    }

}

echo json_encode($data);    
    



//    


?>