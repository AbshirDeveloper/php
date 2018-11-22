<?php require_once("../data/combine.php");  ?>

<?php 

if(isset($_POST['submit']) && $_POST['first_name'] !== ""){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    
    $query = "insert into customer (first_name, last_name, phone) values ('{$first_name}', '{$last_name}', $phone)";
    global $connection;
    mysqli_query($connection, $query);

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
} elseif(isset($_POST['delete_customer'])){
    $id = $_POST['id'];
    $public->delete_customer($id);
} elseif(isset($_POST['delete_product'])){
    $awb = $_POST['id'];
    $public->delete_product($awb);
}

?>


<?php require_once("../data/header.php"); ?>
<div id="main">
<div id="page">
<script>
function clearing(){
    document.getElementById("clear").onclick = function(){
        var answer = prompt("Fadlan gali ID gaaga si aad u masaxdid informationka oo dhan");
        if(answer === "2323"){
            return true;
        } else {
            window.alert("waa khalad numberkaasi");
            return false;
            }
        }
    }
    window.onload = function(){
        clearing();
    }
    
</script>
<div id="">
<form id="kw" action="home.php" method="post">
    <input type="number" name="id" value=""><br />
    <input type="submit" name="delete_product" value="Delete Product"><input type="submit" name="delete_customer" value="Delete Customer">
    </form>
    <div><button><a id="clear" href="../data/edit.php?id=1">Clear the entire data</a></button></div>
<form id="form" action="home.php" method="post">
First Name: <input id="field" type="text" name="first_name" value=""><br />
    <br />
Last Name: <input id="field" type="text" name="last_name" value=""><br />
    <br />
Phone: <input id="field" type="number" name="phone" value=""><br />
    <br />
<input type="submit" name="submit" value="Submit"><br />
<br />
<br />

<div><?php $weight = $public->select_sum('products', 'weight');  echo "Total Weight:  {$weight} ";?><br/>
    <br/>
<button><a href="excel.php?id=1">Download all as Excel</a></button><br/>
    <br />
<form action="excel.php" method="post"><input type="text" name="file_name" value="" /><input type="submit" name="create" value="CREATE"></form>
    
</div>

</form>

<form id="form" action="home.php" method="post">
Customer ID: <input id="field" type="number" name="id" value=""><br />
    <br /> 
AWB: <input id="field" type="text" name="awb" value=""><br />
    <br />
Length: <input id="field" type="number" name="length" value=""><br />
    <br />
Width: <input id="field" type="number" name="width" value=""><br />
    <br />
height: <input id="field" type="number" name="height" value=""><br />
    <br />
Quantity: <input id="field" type="number" name="quantity" value=""><br />
    <br />
Actual Weight: <input id="field" type="number" name="actual_weight" value=""><br />
    <br />
<input type="submit" name="register" value="Submit"><br />
</form>
</div>
<div id="output">
<ul>
<?php 
global $connection;
$query = "select * from customer";
$result = mysqli_query($connection, $query);
while ($array = mysqli_fetch_array($result)){
?>    
<div id="cus">
<div id="cu"><?php 
echo "Customer info" . "<br />";
echo "Name:"; ?> <div id="info"><?php echo $array['first_name']. " " . $array['last_name']. "<br />"; ?></div><br /><?php 
echo "Phone:";?> <div id="info"><?php echo $array['phone']. "<br />";?></div><br /><?php
echo "Customer ID:"; ?> <div id="info"><?php echo $array['id']. "<br />"; ?></div><br /><?php 
echo "Customer Weight:" ?> <div id="info"><?php $weight = $public->select_sum_column('products', 'weight', $array['id']);  echo $weight;?></div><?php
echo "<br/>";
echo "<br/>";
?>
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
<?php
echo "<br />";
echo "<hr />";
}
?>
</ul>
</div>
</div>
<?php require_once("../data/footer.php"); ?>