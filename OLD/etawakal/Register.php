<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php confirm_logged_in(); ?>
<html lang="en">
	<head>
		 <script src="java.js"></script>
		<title>Etawakal Cosmetics</title>
		<link rel="stylesheet" type="text/css" href="public.css">
	</head>
	<body>
    <div id="header">
      <h1 id="tite">Etawakal Cosmetics</h1>
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
         <span id="error"> </span>
         <h1>Register a Product</h1>
		Check here to register new product <input id="checked" type="checkbox" name="pack" value="">
        <div id="kow"><ul>
        <form action="create.php" id="haa" method="post">
        Product Name <input id="labo" type="text" name="product_name" value="";></br>
        Quantity<input type="number" name="quantity" value="";></br>
        Initial Cost <input  type="number" name="initial_cost" value="";></br>
        Final Cost <input type="number" name="final_cost" value="";></br>
        <input type="submit" name="submit" value="submit";></br>
        
        </form>
        <a href="cosmetics.php"><input type="submit" name="Cancel" value="Cancel";></a>
        </ul>
        </div>
        </div>
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>
       
	</body>
</html>
