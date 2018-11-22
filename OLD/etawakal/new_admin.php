<?php require_once("db_connection.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php confirm_logged_in(); ?>

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
            <?php
        $query = "select * from admin";
        $result = mysqli_query($connection, $query);
        ?>
        <form id="kow" action="create_admin.php" method="post">
        <table>
            <tr>
                <th style="text-align: left; width: 250px;">Username</th>
                <th colspan="2" width="100px">Action</th>
            </tr>
            
                <?php while($secure = mysqli_fetch_assoc($result)) {
                ?> 
                <tr>
                   <td> <?php echo $secure['username']; ?> </td>
                   <td><a href="edit_admin.php?id=<?php echo $secure['id']; ?>">Edit</a></td>
                    <td><a href="delete_admin.php?id=<?php echo $secure['id']; ?>" onclick="return confirm('Are you sure you want to delete?');">Delet</a></td>
                </tr>
                <?php
                }
                ?>        
            
        </table>
        <input type="submit" name="submit" value="Register New Admin">
         </form>

        </div>
      
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>
