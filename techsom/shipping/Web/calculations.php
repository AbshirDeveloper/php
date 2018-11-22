<?php require_once("../data/header.php"); 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
$public->login();
if (isset($_POST['download'])){
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment;filename=inventory.csv');
	header('Cache-Control: no-cache, no-store, must-revalidate');
	header('Pragma: no-Cache');
	header('Expires: 0');

	$output = fopen('php://output', 'w');
	$result = $public->select_all('today');
	$row = mysqli_fetch_assoc($result);
	fputcsv($output, $row);
	while($roow = mysqli_fetch_array($result)){
		fputcsv($output, $roow);
	}
	fclose($output);
	exit;
}
?>
<?php require_once("../data/header.php"); ?>	
<div id="main">
<div id="page">
<center><h2>Sales History</h2></center>
 <div id="output">
 <div id="balan">
 <?php echo "Total:"." "."$".$public->select_sum_column('today', 'cost') ?>
 </div><br/>
 <br/>
<table id="daa">
<tr id="leh">
<td id="name">Product Name</td>
<td id="name">Date Sold</td>
<td id="name">Amount Sold</td>
<td id="name">Charged</td>


</tr>
</table>
<table id="totale">
<?php 
$result = $public->select_all('today');
while($array = mysqli_fetch_array($result)) {
?>
<tr>
<td  id="name"><?php echo $array['name']; ?></td>
<td  id="name"><?php echo $array['date']; ?></td>
<td  id="name"><?php echo $array['amount']; ?></td>
<td  id="name" class="count-me"><?php echo "$".$array['cost']; ?></td>
</tr>

<?php
}
?>
</table>
<form action="calculations.php" method="post">
Click here to download: <input type="submit" name="download" id="download" value="Download">;	

</form>
</div>
</div>
<div id="navigation">
<?php require_once("../data/navigation.php") ?>
<script>
window.onload = function(){
		asking();
	}
</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>