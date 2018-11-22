<?php require_once("../data/sessions.php"); 
 require_once("../data/Functions.php");

if(isset($_POST['credit'])){
	$credit = $_POST['amount'];
	$debit = 0;
	$balance = $credit - $debit;
	$description = $_POST['description'];
	$initials = $_POST['initials'];
	$id_balance = $_GET['id'];
	$id_customer = $_SESSION['id'];
	$date = date("m/d/Y", time());

	global $connection;

	$sql = "insert into expenses (date, description_u, initials, debit, credit, balance, id_customer, id_balance) values ('{$date}', '{$description}', '{$initials}', {$debit}, {$credit}, {$balance}, {$id_customer}, {$id_balance})";

	$query = mysqli_query($connection, $sql);



}elseif(isset($_POST['debit'])){
	$debit = $_POST['amount'];
	$credit = 0;
	$balance = $credit - $debit;
	$id_balance = $_GET['id'];
	$id_customer = $_SESSION['id'];
	$initials = $_POST['initials'];
	$description = $_POST['description'];
	$date = date("m/d/Y", time());

	global $connection;

	$sql = "insert into expenses (date, description_u, initials, debit, credit, balance, id_customer, id_balance) values ('{$date}', '{$description}', '{$initials}', {$debit}, {$credit}, {$balance}, {$id_customer}, {$id_balance})";

	$query = mysqli_query($connection, $sql);

} elseif(isset($_GET['page'])){
	global $connection;
	$id = $_GET['page'];
	$sql = "delete from expenses where id = {$id}";
	$query = mysqli_query($connection, $sql);
	header ("location: edit_expenses.php?id={$_SESSION['temp']}");
}

 ?>
<htm>
<head>
<link rel="stylesheet" type="text/css" href="../data/public.css" />
</head>
<body>

</body>
</htm>
<div>
<form id="forme" action="edit_expenses.php?id=<?php echo $_GET['id']; ?>" method="post">
<p><span id="login"></span></p>
<center><h1><?php 
			global $connection;
			$sql = "select description from expenses where id = {$_GET['id']} limit 1";
			$_SESSION['temp'] = $_GET['id'];
        	$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
	        echo $value;
	        }
 ?></h1></center>
<input type="text" name="description" placeholder="Description">
<input type="text" name="initials" placeholder="Initials">
<input type="number" name="amount" placeholder="$$">
<input type="submit" name="credit" value="Credit">	
<input type="submit" name="debit" value="Debit">
</form>
<style>
	#form {
		margin-left: 40px;
		margin-top: 160px;
		padding-left: 0px;
		padding-right: 0px;
		width: 600px;
		background-color: #303030;
		color: black;
	}
	#forme {
		padding-left: 0px;
		padding-right: 0px;
		margin-left: 80px;
		background-color: #303030;
	}
	#name {
		color: black;
	}
	#des {
		width: 350px;
	}
</style>
<table id="form">
<tr>
	<th id="name">Date</th>
	<th id="name">Description</th>
	<th id="name">Debit</th>
	<th id="name">Credit</th>
	<th id="bal">Balance</th>
	<th id="name">Edit</th>
</tr>
<?php

global $connection;

$sql = "select * from expenses where id_balance = {$_GET['id']}";
$query = mysqli_query($connection, $sql);

while($expense = mysqli_fetch_array($query)){
 ?>
<tr>
	<td id="date_d"><?php echo $expense['date']; ?></td>
	<td id="name_d"><?php echo $expense['description_u']; ?></td>
	<td id="paid_d"><?php echo "$".$expense['debit']; ?></td>
	<td id="paid_d"><?php echo "$".$expense['credit']; ?></td>
	<td id="bal_d"><?php echo "$".$expense['balance']; ?></td>
	<td id="bal_d"><a id="" href="edit_expenses.php?page=<?php echo $expense['id']; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>
<script> function event() {
	document.getElementById("forme").onsubmit = function() {
		
	if(document.getElementById("mid").value == "" || document.getElementById("labo").value == "" || document.getElementById("sadex").value == ""){
	document.getElementById("login").innerHTML = "Please provide the correct info";
	document.getElementById("login").style.color = "red";
	return false;
} else {
	document.getElementById("login").innerHTML = "";
	return true;
}
		};
}
	

window.onload = function() {
	event();
}</script>
<style>
	#indent{
		margin-top: 200px;
	}
</style>	

</div>