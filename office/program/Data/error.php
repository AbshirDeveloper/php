<?php 
if(isset($_GET['id'])){
$query = "select * from dayn";

$result = mysqli_query($connection, $query);
$today = date("m-d-Y", time());

$file = "../data/Dayn_from_system/dayn({$today}).csv";
$sc_file ="dayn({$today})"; 

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
<script>	
	window.alert("Successfully Exported <?php echo $sc_file ?>"); 
			document.location.href = "../web/xisaab.php";
</script>
<?php 
} else {
?>
<script>   
       window.alert("You've already Exported <?php echo "Dayn(".date("m-d-Y", time()).")"; ?>");
       document.location.href = "../web/xisaab.php";
  
</script>
<?php
}
}
?>
