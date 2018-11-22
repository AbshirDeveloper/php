<?php require_once("../data/combine.php"); 
 
if(isset($_POST['register'])) {
	$to_pay = 60*60*24*$_POST['days'];
	$due = time() + $to_pay;
	$array = [
	'date' => time(),
	'due_date' => $due,
	'name' => $_POST['name'],
	'amount' => $_POST['amount'],
	'phone' => $_POST['phone'],
	'paid' => 0,
	'balance' => 0 - $_POST['amount'],
	'id_customer' => $_SESSION['id']
];
	$table = "dayn";
	$result = $public->insert($array, $table);
	if($result){
	header ("location: register_dayn.php");
	} else {
		echo "error";
	}
} 
if (isset($_POST['payment'])) {
	$name = $_POST['name'];
	$amount = $_POST['amount'];
	$attribute = "name";
	$table = "dayn";
	

	$array = $public->select_where($table, $attribute, $name);
	if($array){
		$array1 = array (	
	'balance' => $array['balance'] + $amount
	);
	$array2 = array (
		'paid' => $array['paid'] + $amount
	);
		
	$result1 = $public->update($array1, $table, 'name', $name);
	$result2 = $public->update($array2, $table, 'name', $name);

	if($result1 && $result2){
		header ("location: paid.php");
	} else {
		echo "error";
	}
} else {
		echo "error";
	}
	
}
?>
<div id="main">
<div id="page">

<form id="form" action="../data/check_login.php" method="post">
	<h3 id="success">Your have successully registered, please click <a href="../login.php">here</a> to login with your new credentials</h3>
</form>	
</div>
<div id="navigation">
</div>
</div>
<div id="footer"><h3>Chicago Office, <?php echo date("Y", time()); ?></h3></div>
</body>
</html>