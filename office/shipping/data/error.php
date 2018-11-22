<?php require_once("../data/combine.php"); 
$public->login(); 
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





<div id="main">
<div id="page">
<table>
<a href="../data/delete.php"><button>Delete all the zero balance</button></a>
<p><span id="bale"><?php 
$value = $public->select_sum_column('dayn', 'balance');
echo "Balance:" . " " . $value;
?></span></p>
<script>
function guul() {
document.getElementById("registery").onclick = function() {
window.open('register_dayn.php', 'thePopup', 'width=550,height=350');
}
}
function guulo() {
document.getElementById("paid").onclick = function() {
window.open('paid.php', 'thePopup', 'width=550,height=350');
}
}
window.onload = function() {
	guul();
	guulo();
}
</script>
<center><h2>Dayn</h2></center>
<button id="registery">Register</button>
<button id="paid">Payment</button>
<button id="export"><a href="Xisaab.php?id=1">Export Dayn</a></button>
<tr>
	<th id="date">Date</td>
	<th id="date">Due Date</td>
	<th id="name">Name</td>
	<th id="phone">Phone</td>
	<th id="x_amount">Amount</td>
	<th id="paid">Paid</td>
	<th id="bal">Balance</td>
</tr>
<?php 
$table_name = "dayn";
$result = $public->select_all($table_name);
while ($array = mysqli_fetch_array($result)) {
?>
<tr>
	<td id="date_d"><?php echo date("m/d/Y", $array['date']); ?></td>
	<td id="date_d"><?php echo date("m/d/Y", $array['due_date']); ?></td>
	<td id="name_d"><?php echo $array['name']; ?></td>
	<td id="phone_d"><?php echo $array['phone']; ?></td>
	<td id="x_amount_d"><?php echo "$" . $array['amount']; ?></td>
	<td id="paid_d"><?php echo "$" . $array['paid']; ?></td>
	<td id="bal_d"><?php echo "$" . $array['balance']; ?></td>
</tr>
<?php
}
?>
</table>
</div>
<div id="navigation">
	<ul id="kow">
	<a href="home.php">Home</a></br>
	<a href="Cosmetics.php">Cosmetics</a></br>
	<a href="Individual_schedules.php">Individual schedules</a></br>
	<a href="Office_needs.php">office needs</a></br>
	<a href="Xisaab.php">Xisaab</a>
	<hr />
	<h3 id="sagaal"><?php echo "if you are not " . "" . $_SESSION['first_name']. ", please "; ?> <a href="logout.php">Logout</a></h3> <br/>
	</ul>
</div>
</div>
<div id="footer"><h3>Chicago Office, <?php echo date("Y", time()); ?></h3></div>
</body>
</html>