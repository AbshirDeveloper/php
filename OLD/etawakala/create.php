<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<?php
$dbhost = "localhost";
$dbuser   = "cosmetic_exp";
$dbpass = "abshir26";
$dbname = "cosmetics";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>

<?php
$product = $_POST['product_name'];
$quantity = $_POST['quantity'];
$initial_cost = $_POST['initial_cost'];
$final_cost = $_POST['final_cost'];
$net_difference = $_POST['final_cost'] - $_POST['initial_cost'];
$total_net = $_POST['quantity'] * $net_difference;
$total_initial = $_POST['quantity'] * $initial_cost;
$total = $quantity * $final_cost;
$visible = 1;
$query = "insert into cosmetic (product_name, quantity, initial_cost, final_cost, net_difference, total_net, total_initial, total, visible) values ('$product', $quantity, $initial_cost, $final_cost, $net_difference, $total_net, $total_initial, $total, $visible)";

$result = (mysqli_query($connection, $query));
?>

<html lang="en">
	<head>
		<title>Widget Corp</title>
		<link rel="stylesheet" type="text/css" href="public.css">
	</head>
	<body>
    <div id="header">
      <h1>Etawakal Cosmetics</h1>
    </div>

        <div id="navigation">
        <ul>
        <button> Home </button>
        <a href="cosmetics.php"><button> Product List </button></a>
        <a href="Register.php"><button> Register Product </button>
        <a href="new_admin.php"><button>Admin</button></a>
        </ul>
        
        </div>
        <div id="main">
            <div>
                 <a href="Register.php"><b>Click Here</b></a> to register another product or <a href="cosmetics.php"><b>Click Here</b></a> to go to the product list.
            </div>
        </div>
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>
