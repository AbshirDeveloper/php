<?php require_once("../data/header.php");
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
$public->login();

if (isset($_GET['id']) && $_GET['id'] == 2){
	$result3 = $public->select_all('cart');
	while($got = mysqli_fetch_array($result3)){
		$array3 = array(
			'id_customer' => $_SESSION['id'],
			'name' => $got['name'],
			'amount' => $got['amount'],
			'cost'  => $got['total'],
			'date' => time()
			);
		$public->insert($array3, 'today');
	}
	?> <script> 
		window.open('receipt.php', 'thePopup', 'width=350,height=365');
	</script> 
<?php
	
	
}
require_once("../data/header.php"); ?>
<div id="main">
<div id="page">
<style>
	#kow .cart {
		background-color: blue;
		color: white;
	}
	#daa {
		width: 480px;
	}
	#name {
		background-color: aqua;
	}
	#amount {
		background-color: aqua;
	}
	#total {
		background-color: aqua;
	}
</style>
<form id="barcode" action="../pages/congrats.php" method="post">
Product Name: <input type="text" name="name">
Barcode <input type="number" autofocus="autofocus" name="barcode">
<input id="submit" type="submit" name="submit" value="Submit">
</form>
<div id="cart_total">	
<font id="font" size="80"><?php echo "$".$public->select_sum_column('cart', 'total'); ?></font></br>
<a id="basket" href="../pages/paid.php?id=1"><button id="clear"><font size="3">Clear Basket</font></button></a></br>
<a id="paying" href="Cart.php?id=2"><button id="clear"><font size="4">Pay and Clear Basket</font></button></a>
<form id="daymo" action="receipt.php" method="post">
<p id="sidaas">Magaca Qofka:</p>
<input id="" type="text" name="magac" value=""><br/>
<p id="sidaas">Talephone:</p><input id="" type="number" name="taleefon" value=""><br/>
<p id="sidaas">Amount Paid:</p><input id="" type="number" name="paid" value=""><br/>
<p id="sidaas">Days to pay:</p><input id="" type="number" name="days" value=""><br/>
<input id="clear" type="submit" name="dayn" value="Dayn">
</form>
</div>
<table id="daa">
<tr id="leh">
<td id="name">Product Name</td>
<td id="amount">Amount</td>
<td id="total">Total</td>
</tr>
<?php 
$sql = "select * from cart where id_customer = {$_SESSION['id']}";
global $connection;
$query = mysqli_query($connection, $sql);
while ($result = mysqli_fetch_array($query)){
?> 
<tr id="le">
<td id="nam"><?php echo $result['name']; ?></td>
<td id="amoun"><?php echo $result['amount']; ?></td>
<td id="tota"><?php echo "$".$result['total']; ?></td>
</tr>
<?php
}
?>
</table>
</div>
<div id="navigation">
<?php require_once('../data/navigation.php'); ?>
<script>
	function making_sure(){
		document.getElementById('basket').onclick = function(){
			var jawaab = confirm("Ma hubtaa inaad tirtiraysto cartiga");
			if(jawaab = 'true'){
				return true;
			} else {
				return false;
			}
		}

	}

	function paying(){
		document.getElementById('paying').onclick = function(){
			paying_response = confirm("Click OK to proceed the payment and clear your basket");
			if(paying_response = 'true'){
				return true;
			} else {
				return false;
			}
		}
	}

	window.onload = function(){
		making_sure();
		asking();
		paying();
	}
</script>	

</div>
<?php require_once("../data/footer.php"); ?>