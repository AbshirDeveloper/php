<?php require_once("../data/combine.php");
$public->login(); 
$query = "select * from dayn";

$result = mysqli_query($connection, $query);
$today = date("m-d-Y", time());

$file = "Dayn_from_system/dayn({$today}).csv";

$handler = fopen($file, 'x');
if($handler == true){
$array = array("Date", "Due Date", "Name", "Phone", "Amount", "Paid", "Balance");
fputcsv($handler, $array);	

while ($abshir = mysqli_fetch_array($result)){
	$date = date("m/d/Y", $abshir['date']);
	$due_date = date("m/d/Y", $abshir['due_date']);
	$list = array ($date, $due_date, $abshir['name'], $abshir['phone'], $abshir['amount'], $abshir['paid'], $abshir['balance']);
    fputcsv($handler, $list);
}
?>
SUCCESSFULLY IMPORTED, CLICK <a href="../pages/Xisaab.php">HERE</a> TO GO BACK TO DAYN
<?php
}else {
header ("location: error.php");
	}

?>
