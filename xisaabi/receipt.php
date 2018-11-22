<?php require_once("data/sessions.php"); ?>
<?php require_once("data/functions.php"); ?> 

<html>
        <head>
        <title>main</title>
        </head>
        <body>
			<center><h3>Receipt</h3></center>
			<a href="receipt.php" onclick="window.print();return false;">
            Print This Receipt
        </a> <br />
			<br />
<?php 
	  $result = $public->select_all('cart');

	  
	  $total = $_SESSION['amount'] * $_SESSION['price'];
	  echo "Date and Time:" . " ...................". " " . date("m/d/Y    h:m:s", time()) ."<br />";
	  while ($result) {
	  echo "Product Name:" . " " . " " . "...................."  . " " . " " . $result['name'] . "<br />";
	  echo "Amount:" . " " . " " . ".............................."  . " " . " " . $_SESSION['amount'] . "<br />";
	  echo "Price for each: " . "....................." . " " . "$". $_SESSION['price'] . "<br />";
      echo "Total Cost: " . "..........................." . " " . "$". $total . "<br />"; 
  }
	  ?>
	<br />
	<center><h3>Name of the store</h3></center>
	<center>Address of the store</center><br />
	<center>Phone Number</center><br />

        </body>
 </html>