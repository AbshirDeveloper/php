<?php 
require_once("../data/sessions.php");
require_once("../data/combine.php");

$public->login();

if(isset($_GET['page'])){
    global $page; 
    $page = $_GET['page'];
    $_SESSION['page'] = $page;
    $offset = $page * 30;
    global $mid; 
    $mid = $public->offset_dayn($offset);
}
?>

<?php require_once("../data/header.php"); ?>
<div id="main">
<style>
	#kow .dayn {
		background-color: blue;
		color: white;
	}
	#pagination {
        width: 700px;
    }
</style>
<div id="page">
<table>
<a href="../data/delete.php"><button>Delete all the zero balance</button></a>
<p><span id="balan"><?php 
$value = $public->select_sum_column('dayn', 'balance');
$_SESSION['value_dayn'] = $value;
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
while ($array = mysqli_fetch_array($mid)) {
?>
<tr>
	<td id="date_d"><?php echo date("m/d/Y", $array['date']); ?></td>
	<td id="date_d"><?php echo date("m/d/Y", $array['due_date']); ?></td>
	<td id="name_d"><?php echo $array['name']; ?></td>
	<td id="phone_d"><a href="../text.php?id=<?php echo $array['phone']; ?>"><?php echo $array['phone']; ?></a></td>
	<td id="x_amount_d"><?php echo "$" . $array['amount']; ?></td>
	<td id="paid_d"><?php echo "$" . $array['paid']; ?></td>
	<td id="bal_d"><?php echo "$" . $array['balance']; ?></td>
</tr>
<?php
}
?>
</table>
<div id="pagination">
<a id="backward" href="Xisaab.php?page=<?php 
$result = $public->select_count('dayn');
$page = $_SESSION['page'];
$real_page = $result;
if($page > 0){
echo $_SESSION['page']-1;
} else {
echo 0;
}

?>">Previous Page</a>
<a id="forward" href="Xisaab.php?page=<?php 
$result = $public->select_count('dayn');
$page = $_SESSION['page'];
$real_page = $result/10;
$new_page = $real_page - 1;
if($page < $new_page && $real_page > 1){
echo $_SESSION['page']+1; 
} else {
    echo 0;
}
?>">Next Page</a>

</div>
</div>
<div id="navigation">
<?php require_once("../data/navigation.php") ?>
<script>
function done(){
document.getElementById("phone_d").onclick = function (){
window.alert("You've successfully sent a reminder to this person");
}
}

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
	done();
	asking()
}

</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>