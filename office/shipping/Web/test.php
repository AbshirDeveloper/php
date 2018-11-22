<?php require_once("../data/Database_connection.php"); 
	  require_once("../data/Functions.php");
?>

<?php 

global $connectoin;

$result = $public->select_all('today');

if($result){
	while ($good = mysqli_fetch_array($result)) {
		echo $good['name'];
	}
} else {
	echo "no";
}
 ?>