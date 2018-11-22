<?php require_once("db_connection.php"); ?>
<?php confirm_logged_in(); ?>

<html lang="en">
	<head>
		<title>Cookies</title>
	</head>
	<body>
    <div id="header">
      
    </div>

        <div id="navigation">
       
        
        </div>
        <div id="main">
        <?php
            function find_admin_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_query($connection, $username);
	}
            ?>
        <?php
        $result = "select product_name from cosmetic where id = 1";
            
        $name = find_admin_by_username($result);
        echo $name;
            
        ?>
            
        
        </div>
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>
