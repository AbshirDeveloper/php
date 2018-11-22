<?php require_once("../data/header.php"); 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
require_once("../data/Database_connection.php"); 
$public->login();
?>
<div id="main">
<div id="page">
<div id="under">
<style>
button.accordion {
    background-color: green;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
	color: black;
    background-color: yellow; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}
#side {
	float: right;
	width: 90px;
}
#paid {
	float: right;
}
#date {
	float: right;
}
</style>
</head>
<body>

<center><h2>Amaano</h2></center>
<button id="registery">Register</button>
<script>
function guul() {
document.getElementById("registery").onclick = function() {
window.open('add_tran.php', 'thePopup', 'width=550,height=350');
}
}

window.onload = function() {
	guul();
}	
</script>
<?php
global $connection;
$sql = "select * from amano where id_customer = {$_SESSION['id']}";
$query = mysqli_query($connection, $sql);
while($result = mysqli_fetch_array($query)){
?>
<button class="accordion"><?php echo $result['date']." "." "."...... ". ucfirst($result['first_name'])." ".ucfirst($result['last_name']); ?><span id="side"><?php 
$deposit = $public->select_sum_column_where('history', 'deposit', $result['id']); 
$debit = $public->select_sum_column_where('history', 'debit', $result['id']);
echo "$".($deposit - $debit);
?></span></button>
<div class="panel">
<button id="paid">Deposit</button>
<button id="registery">Withdraw</button>
<table>
<tr>
	<th id="phone">Date</th>
	<th id="phone">Digtay</th>
	<th id="phone">Isticmaalay</th>
	<th id="date">Haraadi</th>
</tr>
<tr>
<?php
global $connection;
 $sql = "select * from history where id_customer = {$result['id']}";
$query = mysqli_query($connection, $sql);
?>
	<td id="phone">Date</td>
	<td id="phone">Digtay</td>
	<td id="phone">Isticmaalay</td>
	<td id="date">Haraadi</td>
</tr>
</table>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>
<br />
<?php 
}
?>
</div>
</div>
<div id="navigation">
<?php require_once('../data/navigation.php'); ?>	
<script>
$(document).ready(function() {
	$('[data-toggle="toggle"]').change(function(){
		$(this).parents().next('.hide').toggle();
	});
});
</script>
</div>
<?php require_once("../data/footer.php"); ?>