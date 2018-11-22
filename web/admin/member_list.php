<?php require_once('connect.php');

if(!isset($_SESSION['confirm']) && $_SESSION['confirm'] !== "confirm"){
	header("location: index.php");
}

?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Brighton Website Template | Gallery :: w3layouts</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- light-box -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	</script>
</head>
<body>
<style>

	#red {
		color: red;
	}

.table{
  display: table;
  table-layout: fixed;
  width: 100%;
  padding: 3px;
}

.caption{
  display: table-caption;
  text-align: center;
  font-weight: bold;
}

.thead{
  display: table-header-group;
  font-weight: bold;
}

.tbody{
  display: table-row-group;
}

.tr{
  display: table-row;
}

.th{
  border-bottom: 1px dashed #cccccc;
}

.tr:nth-child(odd){
  background: #f5f5f5;
}

.th,
.td{
  display: table-cell;
}

.td{
  padding: 10px 0;
}

.label{
  display: none;
}

@media all and (max-width: 600px){
  .thead{
    display: none;
  }
  .tr{
    display: block;
    margin-bottom: 1.5em;
    padding: 10px;
  }
  .td{
    display: inherit;
    padding: 0;
  }
  .label{
    font-weight: bold;
    display: inline-block;
    min-width: 120px;
  }  
}
	#logout {
		float: right;
	}
</style>
<div class="header">
		<div class="wrap"> 
			<div class="logo">
				<a href="index.html"><img src="images/loogo.jpg" width="190" height="120" alt=""/></a>	
			</div>
			<div class="top-nav">
				<div class="menu">
				<span class="menu"> </span>
			   		<ul>
						<button id="logout"><a href="index.php?out=0">Logout</a></button>
						<li class=""><a href="home">Home</a></li>
						<li class=""><a href="about">About</a></li>
						<li class=""><a href="vision">Vision</a></li>
						<li class=""><a href="objectives">Objectives</a></li>
						<li class="active"><a href="member_list">Members List</a></li>
						<li class=""><a href="contact">Contact Us</a></li>
					</ul>
					<div class="clear"></div>
	   		  	</div>
				<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".top-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav -->	
	   	   </div>
			<div class="clear"></div>
	  </div>	
 </div>
	<div class="about-top">
		<div class="wrap">
			<div class="about-box">
<div class="contacts table" aria-labelledby="contacts-caption-text">
  <span class="caption" id="contacts-caption-text">Members List</span>
  <div class="contacts-header thead">
    <span class="th" id="th-name">First Name:</span>
    <span class="th" id="th-org">Last Name:</span>
    <span class="th" id="th-phone">Phone:</span>
    <span class="th" id="th-email">Email:</span>
	<span class="th" id="th-email">Status:</span>  
  </div> 
<?php 
	
global $connection;

$sql = "select * from member";
$query = mysqli_query($connection, $sql);
while($result = mysqli_fetch_array($query)){
?>
  <ul class="tbody">
    <li class="tr" itemscope itemtype="http://schema.org/Person">
      <span class="td">
        <span class="label">Name:</span>
        <span class="data" itemprop="name" aria-labelledby="th-name"><?php echo $result['first_name']; ?></span>
      </span>
      <span class="td" itemscope itemtype="http://schema.org/Organization">
        <span class="label">Organisation:</span>
        <span class="data" itemprop="name" aria-labelledby="th-org"><?php echo $result['last_name']; ?></span>
      </span>
      <span class="td">
        <span class="label">Phone:</span>
        <span class="data" itemprop="telephone" aria-labelledby="th-phone"><?php echo $result['phone']; ?></span>
      </span>
      <span class="td">
        <span class="label">Email:</span>
        <span class="data" itemprop="email" aria-labelledby="th-email"><a href="mailto:ola.nordmann@acme-corp.no"><?php echo $result['email']; ?></a></span>
      </span>
	  <span class="td">
        <span class="label">Status</span>
        <span class="data" itemprop="email" aria-labelledby="th-email"><a href="mailto:ola.nordmann@acme-corp.no"><?php echo $result['status']; ?></a></span>
      </span>
    </li>   
  </ul>
<?php
}
?>
</div>
</body>
</html>

    	
    	
            