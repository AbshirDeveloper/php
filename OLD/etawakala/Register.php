<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<?php
$dbhost = "localhost";
$dbuser   = "cosmetic_exp";
$dbpass = "abshir26";
$dbname = "cosmetics";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>

<html lang="en">
	<head>
		<title>Etawakal Cosmetics</title>
		<link rel="stylesheet" type="text/css" href="public.css">
	</head>
	<body>
    <div id="header">
      <h1>Etawakal Cosmetics</h1>
        <h3 id="kan"><a href="login.php">Logout</a></h3>
    </div>

        <div id="navigation">
        <ul>
        <a href="home.php"><button> Home </button></a>
        <a href="cosmetics.php"><button> Product List </button></a>
            <a href="Register.php"><button> Register Product </button></a>
        <a href="new_admin.php"><button>Admin</button></a>
        </ul>
        
        </div>
        <div id="main">
            <h1>Register a Product</h1>
        <div id="kow"><ul>
        <form action="create.php" method="post">
        Product Name <input id="kow" type="text" name="product_name" value="";></br>
        Quantity<input id="kow" type="number" name="quantity" value="";></br>
        Initial Cost <input id="kow" type="number" name="initial_cost" value="";></br>
        Final Cost <input id="kow" type="number" name="final_cost" value="";></br>
        <input type="submit" name="submit" value="submit";>
        </form>
        <a href="cosmetics.php"><input type="submit" name="Cancel" value="Cancel";></a>
        </ul>
        </div>
        
        </div>
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>
