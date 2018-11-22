<?php require_once("../data/header.php");
require_once("../data/sessions.php"); 
require_once("../data/Functions.php"); 
$public->login();
if(isset($_GET['id'])){
	$id = $_GET['id'];
global $connection;
	$query = "update login set status = 'denied' where id = {$id}";
	$result = mysqli_query($connection, $query);
	
}elseif(isset($_GET['page'])){
	$id = $_GET['page'];
global $connection;
	$query = "update login set status = 'approved' where id = {$id}";
	$result = mysqli_query($connection, $query);
}
require_once("../data/header.php"); ?>
<div id="main">
<style>
	#kow .extended2 {
		background-color: blue;
		color: white;
	}
	#pagination {
		width: 690px;
	}
	#fore {
		background-color: lightgray;
		margin-left: 0px;
		color: black;
		width: 700px;
	}
</style>
<div id="page">
	<h1><center>Pending customers for approval</center></h1>
<table border="1" id="fore">
	
<tr>
	<th>Name</th>
	<th>Phone</th>
	<th>Email</th>
	<th>C Name</th>
	<th>Location</th>
	<th>Action</th>
</tr>
<?php

global $connection;
$query = "select * from login where status = 'pending'";
$result = mysqli_query($connection, $query);
while($array = mysqli_fetch_array($result)){
?>
<tr>
	<td><?php echo $array['first_name']; ?></td>
	<td><?php echo $array['phone']; ?></td>
	<td><?php echo $array['email']; ?></td>
	<td><?php echo $array['company_name']; ?></td>
	<td><?php echo $array['city']; ?></td>
	<td><a href="admin.php?id=<?php echo $array['id']; ?>">Deny</a>|<a href="admin.php?page=<?php echo $array['id']; ?>">Confirm</a></td>
</tr>	
	
<?php	
}
	
?>
</table>
</div>
<div id="navigation">
<?php require_once("../data/navigation.php") ?>
<script>
window.onload = function(){
		asking();
		hubi();
	}
</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>
