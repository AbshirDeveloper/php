<?php require_once("db_connection.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php confirm_logged_in(); ?>


<?php
$query = "select * from cosmetic";
$result = mysqli_query($connection, $query);
?>
<?php 
$totalquant = 0;
$initialcost = 0;
$finalcost = 0;
$netdifference = 0;
$totalnet = 0;
$totalinitial = 0;
$total = 0;
while($row = mysqli_fetch_assoc($result)){
$kow = $row['quantity'];
$labo = $row['initial_cost'];
$sadex = $row['final_cost'];
$afar = $row['net_difference'];
$shan = $row['total_net'];
$lix = $row['total_initial'];
$todobo = $row['total'];
    
$totalquant += $kow;
$initialcost += $labo;
$finalcost += $sadex;
$netdifference += $afar;
$totalnet += $shan;
$totalinitial += $lix;
$total += $todobo;
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
            <h1>Product List</h1> 
<table border="1" width="900px">
  <tr>
    <th width="200px" >Product Name</th>
    <th width="100px" >Quantity</th>
    <th width="100px" >Initital Cost</th>
    <th width="100px" >Final Cost</th>
    <th width="100px" >Net Difference</th>
    <th width="100px" >Total Net</th>
    <th width="100px" >Total Initial</th>
    <th width="100px" >Total</th>
    
    </tr>
</table>
<?php
        $query = "select * from cosmetic where visible = 1";
        $result = mysqli_query($connection, $query);
        while ($abshir = mysqli_fetch_assoc($result)){
        ?>
<table width="900px">
  <tr>
    <td width="200px" id="sar"><?php echo $abshir['product_name']; ?></td>
    <td width="100px" id="sad"><?php echo $abshir['quantity']; ?></td>
    <td width="100px" id="sad"><?php echo "$".$abshir['initial_cost']; ?></td>
    <td width="100px" id="sad"><?php echo "$".$abshir['final_cost']; ?></td>
    <td width="100px" id="sad"><?php echo "$".$abshir['net_difference']; ?></td>
    <td width="100px" id="sad"><?php echo "$".$abshir['total_net']; ?></td>
    <td width="100px" id="sad"><?php echo "$".$abshir['total_initial']; ?></td>
    <td width="100px" id="sad"><?php echo "$".$abshir['total']; ?></td>
  </tr>

        <?php 
        }

        ?>
        </div>
        <div>
        <?php
        
            $list
    
            ?>
            
        <?php
            
        ?>
        <tr>
    <td width="200px" id="col"> Total </td>
    <td width="100px" id="col"><?php echo $totalquant; ?></td>
    <td width="100px" id="col"><?php echo "$".$initialcost; ?></td>
    <td width="100px" id="col"><?php echo "$".$finalcost; ?></td>
    <td width="100px" id="col"><?php echo "$".$netdifference; ?></td>
    <td width="100px" id="col"><?php echo "$".$totalnet; ?></td>
    <td width="100px" id="col"><?php echo "$".$totalinitial; ?></td>
    <td width="100px" id="col"><?php echo "$".$total; ?></td>
  </tr>
        </table>
        </div>
        
      <div id="footer">Copyright 2016, Etawakal Cosmetics</div>

	</body>
</html>


