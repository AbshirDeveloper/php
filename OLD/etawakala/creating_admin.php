<?php
$dbhost = "localhost";
$dbuser   = "cosmetic_exp";
$dbpass = "abshir26";
$dbname = "cosmetics";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<?php
    $user = $_POST['username'];
    $pass = $_POST['password'];
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
        <h1></h1>
        <?php
        if($user != null && $pass != null) {
        $query = "insert into admin (username, password) values ('$user', '$pass')";
        $result = mysqli_query($connection, $query);
        echo "Succesfully registered";
            } else {
            echo "please register with a valid content";
        }
        ?>

        </div>
      
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>