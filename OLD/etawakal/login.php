<?php require_once("db_connection.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php logout(); ?>

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
        <form action="checked.php" id="saan" method="post">
        Username <input  type="text" name="username" id="user" value=""></br>
        password <input id="pass" type="password" name="password" value=""></br>
        <input type="submit" name="submit" value="submit">
        <p id="error"></p>
        </form>
		<script src="java.js"></script>
        </div>
        
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>