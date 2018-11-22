<?php require_once("../data/combine.php"); 
 $public->login(); 
if(isset($_GET['id'])){
global $connection;
$query = "truncate data";
mysqli_query($connection, $query);
} elseif(isset($_POST['return'])) {
	if($_POST['name']){
	$data = $public->select_where('data', 'product_name', $_POST['name']);
	$name = $_POST['name'];
	$new_amount = $data['product_amount'] + $_POST['quantity'];
	$array = array(
		'product_amount' => $new_amount,
		);
	$public->update($array, 'data', 'product_name', $name);
} elseif ($_POST['barcode']) {
	$data = $public->select_where('data', 'barcode', $_POST['barcode']);
	$name = $_POST['barcode'];
	$new_amount = $data['product_amount'] + $_POST['quantity'];
	$array = array(
		'product_amount' => $new_amount,
		);
	$public->update($array, 'data', 'barcode', $name);
} 
} elseif(isset($_GET['page'])){
	global $page; 
	$page = $_GET['page'];
	$_SESSION['page'] = $page;
	$offset = $page * 20;
	global $mid; 
	$mid = $public->offset($offset);
}
require_once("../data/header.php"); ?>
<div id="main">
<div id="page">
<?php 
$result = $public->select_all('data');
?>
	<div id="input">
	
		<form id="fore" action="../data/check_products.php" method="post">
			<p id="log">Deleting Window</p>
			<p><span id="log"></span></p>
			Select Product <select name="product_name"><?php while($array = mysqli_fetch_array($result)){ ?>
			<option name="product_name"><?php echo $array['product_name']; ?></option>
			<?php } ?> </select></br>
			</br>
			Amount <input id="madax" type="number" name="amount" value=""><br/>
			</br>
			<input type="submit" name="submit" value="Update">
			<input id="delete" type="submit" name="delete" value="Delete">
				
		</form>
		<form id="for" action="../data/register_products" method="post">
			<p id="login">Registering Window</p>
			<p><span id="login"></span></p>
	
			
			Product name <input id="mid" type="text" name="product_name"></br>
			</br>
			Amount <input id="labo" type="number" name="amount"></br>
			</br>
			Price <input id="labo" type="number" name="price"><br/>
			<br />
			Barcode <input id="mid" type="text" name="barcode"></br>
			<input type="submit" name="submit" value="Submit"><br/>

			
		</form>
	</div>

<style>
body {font-family: "Lato", sans-serif;}

ul.tab {
    list-style-type: none;
    margin-top: 500px;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<body>


<ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'London')">Product List</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Paris')">Finishing Products</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Tokyo')">Expiring Prdocuts</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'bosaso')">Returned Products</a></li>
</ul>

<div id="London" class="tabcontent">
  <h3>Product List</h3>
 <div id="output">
<table id="daa">
<tr id="leh">
<td id="tables">Product Name</td>
<td id="tables">Amount</td>
<td id="tables">Price</td>
<td id="tables">Barcode</td>
<td id="tables">Date</td>
</tr>
</table>
<table>
<tr>
<?php 
global $mid;
while($result = mysqli_fetch_array($mid)){ ?>
<td  id="name"><?php echo $result['product_name']; ?></td>
<td  id="amount"><?php echo $result['product_amount']; ?></td>
<td  id="price"><?php echo "$" . $result['product_actual_price']; ?></td>
<td  id="regis"><?php echo $result['barcode']; ?></td>
<td  id="date"><?php echo $result['date']; ?></td>
</tr>

<?php
}
?>
</table>
<form action="staffaccounts.php" method="post"><input type="submit" name="download" value="Download"></form>
<div><a id="truncate" href="inventory.php?id=1">Truncate Inventory</a></div>
</br>
<div id="pagination">
<a id="backward" href="inventory.php?page=<?php 
$result = $public->select_count('data');
$page = $_SESSION['page'];
$real_page = $result/20;
echo $_SESSION['page']-1; 

?>">Previous Page</a>
<a id="forward" href="inventory.php?page=<?php 
$result = $public->select_count('data');
$page = $_SESSION['page'];
$real_page = $result/20;
if($page < $real_page){
echo $_SESSION['page']+1; 
} else {
	echo 0;
}
?>">Next Page</a>

</div>
</div>
</div>

<div id="Paris" class="tabcontent">
  <h3>Finishing Products</h3>
 <div id="output">
<table id="daa">
<tr id="leh">
<td id="tables">Product Name</td>
<td id="tables">Amount Left</td>
</tr>
</table>
<table>
<?php 
$result = $public->select_finshing('data');
while($array = mysqli_fetch_array($result)) {
?>
<tr>
<td  id="name"><?php echo $array['product_name']; ?></td>
<td  id="amount"><?php echo $array['product_amount']; ?></td>
</tr>

<?php
}
?>
</table>
</div>
</div>
<div id="Tokyo" class="tabcontent">
<h3>Expiring Products</h3>
</div>
<div id="bosaso" class="tabcontent">
<h3>Returned Products</h3>
<form action="inventory.php" method="post">
	
Name: <input type="text" name="name">
Barcode: <input type="number" autofocus="autofocus" name="barcode">
Quantity: <input type="number" name="quantity" value="1">
<input type="submit" name="return" value="Return">

</form>
</div>




<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


</div>

<div id="navigation">
	<?php require_once("../data/navigation.php") ?>
	<script>

function first(){

	document.getElementById('delete').onclick = function(){
		var response = window.confirm("Click OK to delete this product or CANCEL to abort");
		if(response == true){
			return true;
		} else {
			return false;
		}
	}

	document.getElementById('truncate').onclick = function(){
		var jawab = window.prompt("Fadlan gali numberkaagas sirta ah si aad u masaxdid badeecada oo dhan");
		if(jawab == '773'){
			return true;
		} else {
			alert("Waa khalad numbera aad galisay");
			return false;
		}
	}	
}

function event() {
	document.getElementById("for").onsubmit = function() {
		
	if(document.getElementById("mid").value == "" || document.getElementById("labo").value == ""){
	document.getElementById("login").innerHTML = "Please provide product info to register";
	return false;
} else {
	document.getElementById("login").innerHTML = "";
	return true;
}
		};

}

window.onload = function(){
	first();
	asking();
	event();

}

</script>
</div>

</div>
<?php require_once("../data/footer.php"); ?>