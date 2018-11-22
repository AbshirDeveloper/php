<?php require_once("db_connection.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php confirm_logged_in(); ?>

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
      <h1 id="id">Etawakal Cosmetics</h1>
        <h3 id="kan"><a href="login.php">Logout</a></h3>
    </div>

        <div id="navigation">
        <ul>
        <a href="home.php"><button id="badal"> Home </button></a>
        <a href="cosmetics.php"><button id="badal"> Product List </button></a>
        <a href="Register.php"><button id="badal"> Register Product </button></a>
        <a href="new_admin.php"><button id="badal">Admin</button></a>
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


