<?php
$dbhost = "localhost";
$dbuser   = "cosmetic_exp";
$dbpass = "abshir26";
$dbname = "cosmetics";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<?php
$id = $_GET['id'];
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
        <?php if(isset($id)) {
            ?> <form action="edit_admin_final.php?id=<?php echo $id; ?>" method="post">
            Username <input type="text" name="username" value=""></br>
            Password <input type="password" name="password" value=""></br>
            <input type="submit" name="submit" value="Submit">
            </form>
            <?php
            }
            ?>
        <?php
        if(isset($newuser) && isset($newpass)){
            echo "good";
        }
    ?>
        </div>
      
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>