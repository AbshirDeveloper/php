<?php require_once("../data/header.php"); 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
$public->login();
if(isset($_GET['page'])){
    global $page; 
    $page = $_GET['page'];
    $_SESSION['page'] = $page;
    $offset = $page * 50;
    global $mid; 
	$date = "Today";
    $mid = $public->offset_sales($offset, $date);
} elseif (isset($_POST['filter'])){
	$_SESSION['date1'] = strtotime($_POST['date1']);
	$_SESSION['date2'] = strtotime($_POST['date2']);
	echo $_SESSION['date1']." to ".$_SESSION['date2'];
	header("location: calculations.php?page=0");
} elseif (isset($_POST['clear'])){
	unset($_SESSION['date1']);
	unset($_SESSION['date2']);
	header("location: calculations.php?page=0");
}
?>
<div id="main">
<div id="page">
<style>
	#kow .sales {
		background-color: blue;
		color: white;
	}
    #pagination {
        width: 700px;
    }
</style>
<center><h2>Sales History</h2></center>
 <div id="output">
<div id="dat">
	<form action="calculations.php" method="post">
	<input type="date" name="date1" placeholder="dd-mm-yyyy">
	<input type="date" name="date2" placeholder="dd-mm-yyyy">
	<input type="submit" name="filter" value="Filter">
	<input type="submit" name="clear" value="Clear Filter">
	</form>
	
	 
</div>
 <div id="balan">
 <?php echo "Total:"." "."$".$public->select_sum_column_sales('today', 'cost') ?>
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
$result = $public->select_all_sales('today', $date1, $date2);
while($array = mysqli_fetch_array($mid)) {
?>
<tr>
<td  id="name"><?php echo $array['name']; ?></td>
<td  id="name"><?php echo date("m/d/Y", $array['date']); ?></td>
<td  id="name"><?php echo $array['amount']; ?></td>
<td  id="name" class="count-me"><?php echo "$".$array['cost']; ?></td>
</tr>

<?php
}
?>
</table>
<!-- <form action="calculations.php" method="post">
Click here to download: <input type="submit" name="download" id="download" value="Download">;	

</form> -->

<div id="pagination">
<a id="backward" href="calculations.php?page=<?php 
$result = $public->select_count('today');
$page = $_SESSION['page'];
$real_page = $result;
if($page > 0){
echo $_SESSION['page']-1;
} else {
echo 0;
}

?>">Previous Page</a>
<a id="forward" href="calculations.php?page=<?php 
$result = $public->select_count('today');
$page = $_SESSION['page'];
$real_page = $result/50;
$new_page = $real_page - 1;
if($page < $new_page && $real_page > 1){
echo $_SESSION['page']+1; 
} else {
    echo 0;
}
?>">Next Page</a>
</div>
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