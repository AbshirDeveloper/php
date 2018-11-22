<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php"; 

$sql = "select * from settings where id = 1";
$qry = $conn->query($sql);

$data = array();
while($res = mysqli_fetch_array($qry)){
    $txt = $res['send'];
    $email = $res['sent_email'];
}
$today = date("m-d-Y", time());

if($today === $email){
    $confirm = true;
} else {
   $confirm = false; 
}

$data = [$txt, $email, $confirm];
echo json_encode($data);
?>