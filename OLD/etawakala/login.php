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
    
        
        </div>
        <div id="main">
            <h1>Please Login</h1>
        <form action="checked.php" method="post">
            Username <input type="text" name="username" value=""></br>
        password <input type="password" name="password" value=""></br>
        <input type="submit" name="submit" value="submit">
        </form>
        </div>
      
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>