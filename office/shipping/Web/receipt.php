<?php 
require_once("../data/sessions.php"); 
require_once("../data/Database_connection.php"); 
require_once("../data/Functions.php"); 
$public->login();
if(isset($_POST['dayn'])){
	$result = $public->select_all('cart');
	$cart = mysqli_fetch_array($result);
	$column = $public->select_sum_column('cart', 'total');
	$to_pay = 60*60*24*$_POST['days'];
	
	$due_date = time() + $to_pay;
	$date = time();
	$name = $_POST['magac'];
	$phone = $_POST['taleefon'];
	$paid = $_POST['paid'];
	$amount = $column;
	$balance = $paid - $amount;

	$array = array(

		'name' => $name,
		'phone' => $phone,
		'amount' => $amount,
		'paid' => $paid,
		'balance' => $balance,
		'date'  => $date,
		'due_date' => $due_date

		);
	$table_name = 'dayn';

	$public->insert($array, $table_name);

	header("location: Cart.php");
}
?>
        <div id="receipt">
        	<center><h3>Name of the store</h3></center>
			<center>Address of the store</center><br />
			<center>Phone Number</center><br />
			<a href="receipt.php" onclick="window.print();return false;">
            <center><h2>Receipt</h2></center>
        </a> <br />
			<br />
			
<?php 
	  $result = $public->select_all('cart');

	  echo "Date and Time:" . " ........". " " . date("m/d/Y    h:m:s", time()) ."<br />";
	  echo "<hr/>";
	  $query = $public->select_all('cart');
	  while ($result = mysqli_fetch_array($query)) {
	  ?> <span id="product_name"> <?php echo $result['name']; ?></span><span id="product_total"> <?php echo "$".$result['total']; ?></span> <br/> 
  <?php
  }
	  ?>
	  <br/>
	  <hr/>
	  <span id="product_total">Total: <?php echo "$".$public->select_sum_column('cart', 'total'); ?></span>
	 </div>
	<br />
	<?php

global $connection;
		$query = "truncate cart";
		mysqli_query($connection, $query);
?>

        </body>
 </html>