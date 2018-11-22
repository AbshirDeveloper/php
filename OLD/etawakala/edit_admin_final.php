<?php
$dbhost = "localhost";
$dbuser   = "cosmetic_exp";
$dbpass = "abshir26";
$dbname = "cosmetics";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<?php
$newid = $_GET['id'];
$newuser = $_POST['username'];
$newpass = $_POST['password'];
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
        <?php if($newuser != null && $newpass != null) {
        $query = "UPDATE admin set username = '$newuser', password = '$newpass' where id = $newid";
        $result = mysqli_query($connection, $query);
        echo "You succesfully edited";
        } else {
        echo "You submitted a blank fields, no changes will happen"; ?> Click <a href="new_admin.php">Here</a> to retry
        <?php
        }
        ?>
      
        </div>
      
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>