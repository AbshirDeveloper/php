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
        <h1>Register Admin</h1>
        <form action="creating_admin" method="post">
            Username <input type="text" name="username" value=""> </br>
            Password <input type="password" name="password" value=""> </br>
            <input type="submit" name="subnmit" value="submit">
        </form>


        </div>
      
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>
