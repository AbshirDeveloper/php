<?php require_once("../data/header.php"); 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
require_once("../PHPExcel/Classes/PHPExcel.php");
$public->login();

if(isset($_POST['submit']) && $_POST['first_name'] !== ""){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    
    $query = "insert into customer (first_name, last_name, phone) values ('{$first_name}', '{$last_name}', $phone)";
    global $connection;
    mysqli_query($connection, $query);
    header("location: Office_needs.php?page=0");

} elseif (isset($_POST['register']) && $_POST['id'] !== ""){
    $id_customer = $_POST['id'];
    $query = "select * from customer where id = {$id_customer}";
    $result = mysqli_query($connection, $query);
    $array = mysqli_fetch_array($result);
    if($array){
    $awb = $_POST['awb'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $quantity = $_POST['quantity'];
    $actual_weight = $_POST['actual_weight'];
    $vol_weight = $length * $width * $height * $quantity / 366;
    if($actual_weight > $vol_weight){
        $weight = $actual_weight;
    } else {
        $weight = $vol_weight;
    }
    $query = "insert into products (id_customer, awb, length, width, height, quantity, vol_weight, actual_weight, weight) values ({$id_customer}, {$awb}, {$length}, {$width}, {$height}, {$quantity}, {$vol_weight}, {$actual_weight}, {$weight})";
    
    $result = mysqli_query($connection, $query);
    } else {
?> <script>window.alert("please enter valid customer id");</script> 
<?php
    }
    header("location: Office_needs.php?page=0");
}elseif(isset($_GET['page'])){
    global $page; 
    $page = $_GET['page'];
    $_SESSION['page'] = $page;
    $offset = $page * 1;
    global $mid; 
    $mid = $public->offseta($offset);
}

?>
<div id="main">
<link rel="stylesheet" type="text/css" href="../data/public.css">
<div id="page">
<div id="for">
<br />
<form id="" action="update.php" method="post">
    <input type="number" name="id" value=""><br />
    <input type="submit" name="delete_product" value="Delete Product"><input type="submit" name="delete_customer" value="Delete Customer">
</form>
<br />
<br />
<br />
<form id="" action="Office_needs.php" method="post">
Customer ID: <input id="labo" type="number" name="id" value=""><br />
    <br /> 
AWB: <input id="labo" type="text" name="awb" value=""><br />
    <br />
Length: <input id="labo" type="number" name="length" value=""><br />
    <br />
Width: <input id="labo" type="number" name="width" value=""><br />
    <br />
height: <input id="labo" type="number" name="height" value=""><br />
    <br />
Quantity: <input id="labo" type="number" name="quantity" value=""><br />
    <br />
Actual Weight: <input id="labo" type="number" name="actual_weight" value=""><br />
    <br />
Destination: <input id="labo" type="number" name="destination" value=""><br />
    <br />
Remarks: <input id="labo" type="number" name="remarks" value=""><br />
    <br />
<input type="submit" name="register" value="Submit"><br />
</form>
<br />
<form id="" action="Office_needs.php" method="post">
First Name: <input id="labo" type="text" name="first_name" value=""><br />
    <br />
Last Name: <input id="labo" type="text" name="last_name" value=""><br />
    <br />
Phone: <input id="labo" type="number" name="phone" value=""><br />
    <br />
<input type="submit" name="submit" value="Submit"><br />
<br />
<br />
</form>

</div>
<br/>
<div id="outpute">
<ul>
<?php 
// global $connection;
// $query = "select * from customer";
// $result = mysqli_query($connection, $query);
while ($array = mysqli_fetch_array($mid)){
?>    
<div id="cus">
<div id="cu">
 <br />
  <br />
  <br /> 
<?php 
echo "Customer info" . "<br />";?>
<div id="info"><?php echo "Name:" . " ". $array['first_name']. " " . $array['last_name']. "<br />"; ?></div>
<div id="info"><?php echo "Phone:" . " ". $array['phone']. "<br />";?></div>
<div id="info"><?php echo "ID:" . " ". $array['id']. "<br />"; ?></div>
<div id="info"><?php $weight = $public->select_sum_column('products', 'weight', $array['id']); $weight = $public->select_sum_column_where('products', 'weight', $array['id']); echo "Customer Weight:" . " " . $weight;?></div>
</div>
<table id="table" border="1">
<tr>
    <td id="fiel">AWB</td>
    <td id="fiel">Length</td>
    <td id="fiel">Width</td>
    <td id="fiel">Height</td>
    <td id="fiel">Quantity</td>
    <td id="fiel">Weight</td>
</tr>

<?php $query1 = "select * from products where id_customer = {$array['id']}";
global $connection;
$abshir = mysqli_query($connection, $query1); 
global $jama;
while ($jama = mysqli_fetch_array($abshir)){
?>  <tr>
    <td id="awb"><?php echo $jama['awb']; ?></td>
    <td id="length"><?php echo $jama['length']; ?></td>
    <td id="width"><?php echo $jama['width']; ?></td>
    <td id="height"><?php echo $jama['height']; ?></td>
    <td id="quantity"><?php echo $jama['quantity']; ?></td>
    <td id="weight"><?php echo $jama['weight']; ?></td>
    </tr> 
<?php
}
?>
</table>
 <br />
  <br />
  <br /> 
<?php
echo "<br />";
}
?>
</ul>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div id="pagination">
<a id="backward" href="Office_needs.php?page=<?php 
$result = $public->select_count('customer');
$page = $_SESSION['page'];
$real_page = $result/1;
if($page > 0){
echo $_SESSION['page']-1;
} else {
echo 0;
}

?>">Previous Page</a>
<a id="forward" href="Office_needs.php?page=<?php 
$result = $public->select_count('customer');
$page = $_SESSION['page'];
$real_page = $result/1;
if($page < $real_page - 1){
echo $_SESSION['page']+1; 
} else {
    echo 0;
}
?>">Next Page</a>

</div>
</div>
<div id="navigation">
<?php require_once("../data/navigation.php") ?>
<script>
window.onload = function(){
		asking();
	}
</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>