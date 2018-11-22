<?php require_once("../data/sessions.php"); 
 require_once("../data/Functions.php");

if(isset($_POST['cash'])){
	$credit = $_POST['amount'];
	$description = $_POST['description'];
	$id_customer = $_SESSION['id'];
	$date = date("m/d/Y", time());

	global $connection;

	$sql = "insert into cash (date, description, amount, id_customer) values ('{$date}', '{$description}', {$credit}, {$id_customer})";

	$query = mysqli_query($connection, $sql);

}elseif(isset($_GET['cash'])){
	$id = $_GET['cash'];
	
	$sql = "delete from cash where id = {$id} limit 1";
	$query = mysqli_query($connection, $sql);
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
<form id="forme" action="edit_cash.php" method="post">
	<span><center><h1>Cash</h1></center></span><span id="right"><h3><?php
	
	$sql = "select sum(amount) from cash where id_customer = {$_SESSION['id']} limit 1";
	$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
	        echo "$".$value;
			}
	?></h3></span>
<input type="text" name="description" placeholder="Description">
<input type="number" name="amount" placeholder="$$">
<input type="submit" name="cash" value="Cash">
</form>
<style>
	#form {
		margin-left: 40px;
		margin-top: 130px;
		padding-left: 0px;
		padding-right: 0px;
		width: 600px;
		background-color: #303030;
		color: black;
	}
	#forme {
		margin-top: 30px;
		padding-left: 0px;
		padding-right: 0px;
		margin-left: 80px;
		background-color: #303030;
		width: 500px;
		margin-bottom: 40px;
	}
	#name {
		color: black;
	}
	#des {
		width: 350px;
	}
	#right{
		float: right;
	}
</style>
<table id="form">
<tr>
	<th id="name">Date</th>
	<th id="name">Description</th>
	<th id="name">Amount</th>
	<th id="name">Edit</th>
</tr>
<?php

global $connection;

$sql = "select * from cash where id_customer = {$_SESSION['id']}";
$query = mysqli_query($connection, $sql);

while($expense = mysqli_fetch_array($query)){
 ?>
<tr>
	<td id="date_d"><?php echo $expense['date']; ?></td>
	<td id="name_d"><?php echo $expense['description']; ?></td>
	<td id="bal_d"><?php echo "$".$expense['amount']; ?></td>
	<td id="name"><a href="edit_cash.php?cash=<?php echo $expense['id']; ?>">Delete</a></td>
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