<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<?php
$dbhost = "localhost";
$dbuser   = "cosmetic_exp";
$dbpass = "abshir26";
$dbname = "cosmetics";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<?php
if(isset($_POST['product'])){
  $pro = $_POST['product'];  
$query = "DELETE FROM cosmetic WHERE product_name = '$pro';";
$result = mysqli_query($connection, $query);
}

if(isset($_POST['submit'])) {
    echo "<script>alert('Deleted!');</script>";
}
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
        <h1>Sold Product Entry</h1>
        <form action="function.php" method="post">
        <select name="product" width="150px">
        <?php 
          $query = "select * from cosmetic";
          $result = mysqli_query($connection, $query);
          while ($dham = mysqli_fetch_assoc($result)) {
          ?> <option name="product"><?php echo $dham['product_name']; ?></option>
          <?php
          }
            ?> 
        
        </select>
        <input type="number" name="quantity" value="">
        <input type="submit" name="submit" value="submit">
        
        </form>
        <form id="for" action="home.php" method="post">
            <h1>Delete Product</h1>
        <select name="product" width="150px">
        <?php 
          $query = "select * from cosmetic";
          $result = mysqli_query($connection, $query);
          while ($dham = mysqli_fetch_assoc($result)) {
          ?> <option name="product"><?php echo $dham['product_name']; ?></option>
          <?php
          }
            
            ?> 
        <input type="submit" name="submit" value="Delete">
        </select>
        
        
        </form>  
        <table border="1">
        <h1>Missing or Finishing Products</h1>
          <tr>
            <th width="250px" id="sad">Product Name</th>
              <th width="100px" id="sad">Quantity</th>
            </tr>
</table>
        <?php 
          $query = "select * from cosmetic";
          $result = mysqli_query($connection, $query);
          while ($dham = mysqli_fetch_assoc($result)) {
              ?>
            <table>
            <td width="250px">
            <?php if ($dham['quantity'] < 2) {
                  echo $dham['product_name'];
              } else {
                  echo null;
              } ?>
            </td>
            <td width="100px">
             <?php if ($dham['quantity'] < 2) {
                  echo $dham['quantity'];
              } else {
                  echo null;
              } ?>
            </td>
            
            </table>
            
        <?php
          }
            
        
        ?>
        
        
              
       
    

        </div>
      
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>


