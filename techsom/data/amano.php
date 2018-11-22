<?php 
require_once("../data/header.php"); 
require_once("../data/sessions.php");
require_once("../data/Functions.php"); 
$public->login();

if(isset($_GET['page'])){
    global $page; 
    $page = $_GET['page'];
    $_SESSION['page'] = $page;
    $offset = $page * 10;
    global $mid; 
    $mid = $public->offset_customer($offset);
} 
?>
<div id="main">
<style>
  #kow .amaano {
    background-color: blue;
    color: white;
  }
</style>
<!--   <meta name="viewport" content="initial-scale=1, maximum-scale=1"> -->

  <link rel="stylesheet" type="text/css" href="../assets-2/css/reset.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Abeezee:400|Open+Sans:400,600,700|Source+Sans+Pro:400,600">
  <!-- <link rel="stylesheet" type="text/css" href="defaults.css"> -->
  <link rel="stylesheet" type="text/css" href="demo.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="accordion.js">
  </script>
<div id="page">
<center><h2>Amaano Transactions</h2></center>
<div>
<form id="new" action="add_tran.php" method="post">
<center><h1> Register </h1></center>
<center><p><span id="login"></span></p></center>
<input id="neww" type="text" name="first_name" placeholder="First Name"> 
<input id="newe" type="text" name="last_name"  placeholder="Last Name"> 
<input id="ph" type="tel" name="phone"  placeholder="Phone#"> 
<input type="submit" name="register" value="Register">
</form>
<script>	
	
function event() {
  document.getElementById("new").onsubmit = function() {
    
  if(document.getElementById("neww").value == "" || document.getElementById("newe").value == "" || document.getElementById("ph").value == ""){
  document.getElementById("login").innerHTML = "Fadlan buuxi labada magac iyo taleefonkaba";
  document.getElementById("login").style.color = "red";
  return false;
} else {
  document.getElementById("login").innerHTML = "";
  return true;
}
    };
}

</script>
</div>
  <div id="under">
  <style>
    #side {
      float: right;
      color: yellow;
    }
	 #side_list {
      float: right;
      color: yellow;
    }
	 #side_customer {
      float: right;
      color: yellow;
    }
    #side1{
      color: yellow;
      float: center;
    }
    #pagination {
      width: 100%;
      background-color: grey;
      color: white;
    }
    #center {
      margin-right: 30px;
      float: left;
    }
  </style>
  <div id="side">
  </div>
    <div class="accordion">
  <?php 
  global $connection;
  while($result = mysqli_fetch_array($mid)){
   ?>
      <div class="accordion-section">
        <a class="accordion-section-title" href="#accordion-<?php echo $abshir; ?>"><span id="side1"><?php echo ucfirst($result['first_name']). " ". ucfirst($result['last_name']); ?></span><span id="center"><?php echo "Phone#:". " ".$result['phone']; ?></span><span id="side">
        <?php 
        $sl = "select sum(balance) from amano where customer_id = {$result['id']} limit 1";
        $result2 = mysqli_query($connection, $sl);
        $string2 = mysqli_fetch_object($result2);
        foreach ($string2 as $value) {
        echo "$".$value;
        }
        ?></span></a>
        <div id="accordion-<?php echo $abshir; ?>" class="accordion-section-content">
         <a id="side_customer" href="add_tran.php?delete=<?php echo $result['id']; ?>"><button>Delete Customer</button></a>
		
			<script>
	document.getElementById("side_customer").onclick = function(){
		var jawaab = confirm("Ma hubtaa inaad tirtirayso customerkaan? hadii aad OK tiraahdid dhamaan transactions kiisa oo dhan way raacayaan. wax tix raac ahna kama harayo.");
			if(jawaab){
				return true;
			} else {
				return false;
			}
	}

			
		</script>
        <form action="add_tran.php?id=<?php echo $result['id']; ?>" method="post">
          <input type="number" name="amount" placeholder="Amount in $$"><input type="submit" name="deposit" value="Deposit"><input type="submit" name="debit" value="Debit">
        </form>

        <table id="daa">
          <tr>
            <th id="name">Date</th>
            <th id="name">Deposit</th>
            <th id="name">Debit</th>
            <th id="name">Balance</th>
          </tr>
    <?php $sql1 = "select * from amano where customer_id = {$result['id']} limit 8";
          $query1 = mysqli_query($connection, $sql1);
          while ($result1 = mysqli_fetch_array($query1)){
       ?>
        <tr>
            <td><?php echo $result1['date']; ?></td>
            <td><?php echo "$".$result1['deposit']; ?></td>
            <td><?php echo "$".$result1['debit']; ?></td>
            <td><?php echo "$".$result1['balance']; ?> <a id="side_delete" href="add_tran.php?page=<?php echo $result1['id']; ?>">Delete</a><script>
		
		
	document.getElementById("side_delete").onclick = function(){
		var jawaab = confirm("Ma hubtaa inaad tirtirayso lacagtaan");
			if(jawaab){
				return true;
			} else {
				return false;
			}
	}

			
		</script></td>
          </tr>
    <?php
  }
  ?>
        </table>
			<a id="side_list"><button>More Customer History</button></a>
			<script>
			document.getElementById("side_list").onclick = function(){
			window.open('customer_history.php?id=<?php echo $result['id']; ?>', 'thePopup', 'width=750,height=1050');
			}
			</script>
        </div><!--end .accordion-section-content-->
		  
      </div><!--end .accordion-section-->
<?php
$abshir++;
 } ?>
<br />
<br />
<div id="pagination">
<a id="backward" href="amano.php?page=<?php 
$result = $public->select_count('amano');
$page = $_SESSION['page'];
$real_page = $result;
if($page > 0){
echo $_SESSION['page']-1;
} else {
echo 0;
}

?>">Previous Page</a>
<a id="forward" href="amano.php?page=<?php 
$result = $public->select_count('amano');
$page = $_SESSION['page'];
$real_page = $result/10;
$new_page = $real_page - 1;
if($page < $new_page && $real_page > 1){
echo $_SESSION['page']+1; 
} else {
    echo 0;
}
?>">Next Page</a>

</div>
    </div><!--end .accordion-->
  </div>
</div>
<div id="navigation">
<?php require_once("../data/navigation.php") ?>
<script>
window.onload = function(){
    asking()
	event();
  }
</script>
</div>
</div>
<?php require_once("../data/footer.php"); ?>