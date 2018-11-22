<?php require_once("../data/functions.php"); ?>
<?php require_once("../data/database_connection.php"); ?>
<?php require_once("../data/sessions.php"); ?>

<?php 
if(isset($_GET['page'])){
	$page = $_GET['page'];
	$offset = $page - 1;
	$mid = $public->offset($offset);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../data/public.css">
</head>
<body>
<table id="daa">
<tr id="leh">
<td id="tables">Product Name</td>
<td id="tables">Amount</td>
<td id="tables">Price</td>
<td id="tables">Barcode</td>
<td id="tables">Date</td>
</tr>
</table>
<table>
<tr>
<?php while($result = mysqli_fetch_array($mid)){ ?>
<td  id="name"><?php echo $result['product_name']; ?></td>
<td  id="amount"><?php echo $result['product_amount']; ?></td>
<td  id="price"><?php echo "$" . $result['product_actual_price']; ?></td>
<td  id="regis"><?php echo $result['barcode']; ?></td>
<td  id="date"><?php echo $result['date']; ?></td>
</tr>

<?php
}
}
?>
</table>
</body>
</html>