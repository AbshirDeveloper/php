<?php 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
$public->login();
?>
	<script>
			function exportion(){
				document.getElementById("export").onclick = function(){
			var ask = window.confirm("Are you sure you want to export <?php echo "Dayn(". date("m/d/Y", time()).")"; ?> for today?");
			if (ask) { 
			return true;
			}else {
			return false;
			}
			}
			}
	</script>

<?php require_once("../data/header.php"); ?>
<div id="main">
<div id="page">
<table>
<a href="../data/delete.php"><button>Delete all the zero balance</button></a>
<p><span id="balan"><?php 
$value = $public->select_sum_column('dayn', 'balance');
echo "Total:" . " " ."$". $value;
?></span></p>

<center><h2>Dayn</h2></center>
<button id="registery">Register</button>
<button id="paid">Payment</button>
<button id="export"><a href="../data/error.php?id=1">Export Dayn</a></button>
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
<?php require_once("../data/navigation.php") ?>
<script>
function guul() {
document.getElementById("registery").onclick = function() {
window.open('../pages/register_dayn.php', 'thePopup', 'width=550,height=350');
}
}
function guulo() {
document.getElementById("paid").onclick = function() {
window.open('../pages/paid.php', 'thePopup', 'width=550,height=350');
}
}
window.onload = function() {
	guul();
	guulo();
	exportion();
	asking();
}

</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>