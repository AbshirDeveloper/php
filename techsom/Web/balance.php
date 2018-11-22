<?php require_once("../data/header.php");
require_once("../data/sessions.php"); 
require_once("../data/Functions.php");
require_once("../data/Database_connection.php"); 
$public->login();
if(isset($_POST['register'])){
	$description = $_POST['description'];
	$id_customer = $_SESSION['id'];
	$id = $id_customer + 1;

	global $connection;
	$sql = "SELECT COUNT(id) As total FROM expenses where local_id = {$id}";
	$result = mysqli_query($connection, $sql);
	$data = mysqli_fetch_assoc($result);
	$num = $data['total'];

	if($num >= 9){
	?>
	<script>
		window.alert("You've exceeded the limit");
	</script>
	<?php
	} else {
	$sql = "insert into expenses (description, local_id) values ('{$description}', {$id})";
	$query = mysqli_query($connection, $sql);
}
} elseif (isset($_POST['cash'])){
	$amount = $_POST['current_balance'];
	$description = $_POST['description'];
	$date = date("m/d/Y", time());
	$id_customer = $_SESSION['id'];
	global $connection;

	$sql = "insert into cash (amount, description, date, id_customer) values ({$amount}, '{$description}', '{$date}', {$id_customer})";

	$query = mysqli_query($connection, $sql);
}elseif(isset($_POST['initial'])){
	global $connection;
	$date = time();
	$id_customer = $_SESSION['id'];
	$amount = $_POST['current_balance'];
	$try = "insert into initial (date, id_customer, amount) values ('{$date}', {$id_customer}, {$amount});";
	$que = mysqli_query($connection, $try);
	
}elseif(isset($_GET['id'])){
?>
<script>
window.open('edit_expenses.php?id=<?php echo $_GET['id']; ?>', 'thePopup', 'width=750,height=1050');
</script>
<?php
}elseif(isset($_GET['cash'])){
?>
<script>
window.open('edit_cash.php', 'thePopup', 'width=750,height=1050');
</script>
<?php
}elseif(isset($_GET['page'])){
	global $connection;
	$id = $_GET['page'];
	$sql = "delete from expenses where id_balance = {$id}";
	$query = mysqli_query($connection, $sql);

	$sql2 = "delete from expenses where id = {$id}";
	$query2 = mysqli_query($connection, $sql2);
}
?>
<div id="main">
<style>
	#kow .balance {
		background-color: blue;
		color: white;
	}
</style>
<div id="page">
<form id="form_top" action="balance.php" method="post">
<input type="number" name="current_balance" placeholder="Cash $$$">
<input type="text" name="description" placeholder="Description">
<input type="submit" name="cash" value="Cash">
<input type="submit" name="initial" value="Initial">
</form>
<form id="form_side">
	<select id="select">
	<?php
	$cash = $public->select_all('cash');
	while($result = mysqli_fetch_array($cash)){
	 ?>
		<option><?php echo $result['date'].".... ".$result['description'].".... "."$".$result['amount']." ";?></option>
	<?php 
	}
	?>
	</select>
	<a href="balance.php?cash=1">Edit</a>
</form>
<span>Initial: <?php

$sql = "select sum(amount) from initial where id_customer = {$_SESSION['id']} limit 1";
$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
			$_SESSION['initial'] = $value;
	        echo "$".$value;
	        }	
?></span>
<br />
<style>
#red {
	background-color: red;
}
#select {
	margin-left: 50px;
}
#form_side {
	border-style: solid;
}
#form_top {
	float: left;
}
#main {
	background-color: antiquewhite;
}
#pricing-table {
	text-align: center;
	width: 892px; /* total computed width = 222 x 3 + 226 */
	margin: auto;
}

#pricing-table .plan {
	font: 12px 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;
	text-shadow: 0 1px rgba(255,255,255,.8);        
	background: lightblue;     
	border: 1px solid #ddd;
	color: #333;
	padding: 20px;
	width: 97px; /* plan width = 180 + 20 + 20 + 1 + 1 = 222px */      
	float: left;
	position: relative;
}

#pricing-table #most-popular {
	z-index: 2;
	top: -13px;
	border-width: 3px;
	padding: 30px 20px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 20px 0 10px -10px rgba(0, 0, 0, .15), -20px 0 10px -10px rgba(0, 0, 0, .15);
	-webkit-box-shadow: 20px 0 10px -10px rgba(0, 0, 0, .15), -20px 0 10px -10px rgba(0, 0, 0, .15);
	box-shadow: 20px 0 10px -10px rgba(0, 0, 0, .15), -20px 0 10px -10px rgba(0, 0, 0, .15);    
}

#pricing-table .plan:nth-child(1) {
	-moz-border-radius: 5px 0 0 5px;
	-webkit-border-radius: 5px 0 0 5px;
	border-radius: 5px 0 0 5px;        
}

#pricing-table .plan:nth-child(4) {
	-moz-border-radius: 0 5px 5px 0;
	-webkit-border-radius: 0 5px 5px 0;
	border-radius: 0 5px 5px 0;        
}

/* --------------- */	

#pricing-table h3 {
	font-size: 20px;
	font-weight: normal;
	padding: 20px;
	margin: -20px -20px 50px -20px;
	background-color: #eee;
	background-image: -moz-linear-gradient(#fff,#eee);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));    
	background-image: -webkit-linear-gradient(#fff, #eee);
	background-image: -o-linear-gradient(#fff, #eee);
	background-image: -ms-linear-gradient(#fff, #eee);
	background-image: linear-gradient(#fff, #eee);
}

#pricing-table #most-popular h3 {
	background-color: #ddd;
	background-image: -moz-linear-gradient(#eee,#ddd);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#eee), to(#ddd));    
	background-image: -webkit-linear-gradient(#eee, #ddd);
	background-image: -o-linear-gradient(#eee, #ddd);
	background-image: -ms-linear-gradient(#eee, #ddd);
	background-image: linear-gradient(#eee, #ddd);
	margin-top: -30px;
	padding-top: 30px;
	-moz-border-radius: 5px 5px 0 0;
	-webkit-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0; 		
}

#pricing-table .plan:nth-child(1) h3 {
	-moz-border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	border-radius: 5px 0 0 0;       
}

#pricing-table .plan:nth-child(4) h3 {
	-moz-border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	border-radius: 0 5px 0 0;       
}	

#pricing-table h3 span {
	display: block;
	font: bold 25px/100px Georgia, Serif;
	color: #777;
	background: lightgreen;
	border: 5px solid #fff;
	height: 100px;
	width: 100px;
	margin: 10px auto -65px;
	-moz-border-radius: 100px;
	-webkit-border-radius: 100px;
	border-radius: 100px;
	-moz-box-shadow: 0 5px 20px #ddd inset, 0 3px 0 #999 inset;
	-webkit-box-shadow: 0 5px 20px #ddd inset, 0 3px 0 #999 inset;
	box-shadow: 0 5px 20px #ddd inset, 0 3px 0 #999 inset;
}

/* --------------- */

#pricing-table ul {
	margin: 20px 0 0 0;
	padding: 0;
	list-style: none;
}

#pricing-table li {
	border-top: 1px solid #ddd;
	padding: 10px 0;
}

/* --------------- */
	
#pricing-table .signup {
	position: relative;
	padding: 8px 20px;
	margin: 20px 0 0 0;  
	color: #fff;
	font: bold 14px Arial, Helvetica;
	text-transform: uppercase;
	text-decoration: none;
	display: inline-block;       
	background-color: #72ce3f;
	background-image: -moz-linear-gradient(#72ce3f, #62bc30);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#72ce3f), to(#62bc30));    
	background-image: -webkit-linear-gradient(#72ce3f, #62bc30);
	background-image: -o-linear-gradient(#72ce3f, #62bc30);
	background-image: -ms-linear-gradient(#72ce3f, #62bc30);
	background-image: linear-gradient(#72ce3f, #62bc30);
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;     
	text-shadow: 0 1px 0 rgba(0,0,0,.3);        
	-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, .5), 0 2px 0 rgba(0, 0, 0, .7);
	-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .5), 0 2px 0 rgba(0, 0, 0, .7);
	box-shadow: 0 1px 0 rgba(255, 255, 255, .5), 0 2px 0 rgba(0, 0, 0, .7);
}

#pricing-table .signup:hover {
	background-color: #62bc30;
	background-image: -moz-linear-gradient(#62bc30, #72ce3f);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#62bc30), to(#72ce3f));      
	background-image: -webkit-linear-gradient(#62bc30, #72ce3f);
	background-image: -o-linear-gradient(#62bc30, #72ce3f);
	background-image: -ms-linear-gradient(#62bc30, #72ce3f);
	background-image: linear-gradient(#62bc30, #72ce3f); 
}

#pricing-table .signup:active, #pricing-table .signup:focus {
	background: #62bc30;       
	top: 2px;
	-moz-box-shadow: 0 0 3px rgba(0, 0, 0, .7) inset;
	-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .7) inset;
	box-shadow: 0 0 3px rgba(0, 0, 0, .7) inset; 
}

/* --------------- */

.clear:before, .clear:after {
  content:"";
  display:table
}

.clear:after {
  clear:both
}

.clear {
  zoom:1
}

/*	
	Side Navigation Menu V2, RWD
	===================
	License:
	http://goo.gl/EaUPrt
	===================
	Author: @PableraShow

 */






.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 700px;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
#color {
	color: yellow;
}
</style>
<?php 
$expenses = 55;
?>
<div id="pricing-table" class="clear">
    <div class="plan">
        <h3>Expenses<span><?php $sql = "select sum(balance) from expenses where id_customer = {$_SESSION['id']} limit 1";
        	$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
	        $_SESSION['expenses'] = $value;
	        echo "$".$value;
	        } ?></span></h3>        
        <ul>
            <li></li>
            <li></li>
            <li></li>
			<li></li>			
        </ul> 
    </div>
        <div class="plan">
        <h3>Cash<span><?php $sql = "select sum(amount) from cash where id_customer = {$_SESSION['id']} limit 1";
        	$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
	        $_SESSION['cash'] = $value;
	        echo "$".$value;
	        } ?></span></h3>        
        <ul>
            <li></li>
            <li></li>
            <li></li>
			<li></li>			
        </ul> 
    </div>
    <div class="plan" id="most-popular">
        <h3>Overall Balance<span><?php $bala = -$_SESSION['amano']-$_SESSION['expenses']+$_SESSION['cash']+$_SESSION['initial']-$_SESSION['dayn']; echo "$".$bala; ?></span></h3>       
        <ul>
            <li></li>
            <li></li>
            <li></li>
			<li></li>			
        </ul>    
    </div>
    <div class="plan">
        <h3>Dayn<span><?php 
        	$sql = "select sum(balance) from dayn where id_customer = {$_SESSION['id']} limit 1";
        	$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
	        $_SESSION['dayn'] = $value;
	        echo "$".$value;
	        } ?></span></h3>
        <ul>
            <li></li>
            <li></li>
            <li></li>
			<li></li>			
        </ul>
    </div> 
    <div class="plan">
        <h3>Amaano<span><?php 
       	$sql = "select sum(balance) from amano where id_balance = {$_SESSION['id']} limit 1";
        	$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
	        $_SESSION['amano'] = $value;
	        echo "$".$value;
	        }
         ?></span></h3>        
        <ul>
            <li></li>
            <li></li>
            <li></li>
			<li></li>			
        </ul> 
    </div>
</div>

<center><h1>Expenses</h1></center>
<form id="form_side" action="balance.php" method="post">
	<input type="text" name="description" placeholder="Description">
	<input type="submit" name="register" value="Register">
</form>
<table class="container">
<br />
	<thead>
		<tr>
			<th><h1>Edit</h1></th>
			<th><h1>Description</h1></th>
			<th><h1>Balance</h1></th>
			<th><h1>Delete</h1></th>
		</tr>
	</thead>
	<?php
	$local_id = $_SESSION['id'] + 1;
	$sql = "select * from expenses where local_id = {$local_id}";
	$query = mysqli_query($connection, $sql);

	while($result = mysqli_fetch_array($query)){
	 ?>
	 <tbody>
		<tr id="color">
			<th><a href="balance.php?id=<?php echo $result['id']; ?>">...</a></th>
			<td><?php echo $result['description']; ?></td>
			<td><?php 
			global $connection;
			$sql = "select sum(balance) from expenses where id_balance = {$result['id']} limit 1";
        	$result2 = mysqli_query($connection, $sql);
	        $string2 = mysqli_fetch_object($result2);
	        foreach ($string2 as $value) {
	        echo "$".$value;
	        }
			 ?>
		</td>
		<td><a id="del" href="balance.php?page=<?php echo $result['id']; ?>">Delete</a>
			<script>	
	document.getElementById("del").onclick = function(){
		var jawaab = confirm("Ma hubtaa inaad tirtirayso expense kaan? hadii aad OK tiraahdid dhamaan expenses ka ku hoos jira way raacayaan. wax tix raac ahna kama harayo.");
			if(jawaab == 'true'){
				return true;
			} else {
				return false;
			}
	}

			
		</script>	
		</td>
		</tr>
	</tbody>
<?php
}
?>
</table>
</div>
<div id="navigation">
<?php require_once('../data/navigation.php'); ?>
<script>
window.onload = function(){
	asking();
}	
</script>
</div>
<?php require_once("../data/footer.php"); ?>