<?php require_once('../connect.php'); 

if(isset($_GET['id']) && $_GET['id'] == 'confirm'){
	$message = "You have successfully registerd and became a valued member in Hogol organization, Please proceed to login and enjoy your membership";
}
	
?>

<html>
<head>
		
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		
		<!--//webfonts-->
	
		
		<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="../js/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div class="wrap"> 
			<div class="logo">
				<a href="index.html"><img src="../images/loogo.jpg" width="190" height="120" alt=""/></a>	
			</div>
			<div class="top-nav">
				<div class="menu">
				<span class="menu"> </span>
			   		<ul>
						<li class=""><a href="../index">Home</a></li>
						<li class=""><a href="../about">About</a></li>
						<li class=""><a href="../vision">Vision</a></li>
						<li class=""><a href="../objectives">Objectives</a></li>
						<li class="active"><a href="index">Membership</a></li>
						<li class=""><a href="../contact">Contact Us</a></li>
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
	<style>
	#circle {
  		border-radius: 50%;
		}
		.header {
			background-color: blue;
		}
		
	</style>
	<div class="main">
		<?php if(isset($message)){
		?>
		<script>
		
		window.alert("<?php echo $message; ?>");
		
		</script>
		<?php
		}
		?>
		<div class="header" >
			<h1>Login or Become a Member Today!</h1>
		</div>
		<p></p>
			<form action="create_check.php" method="post">
				<ul class="left-form">
					<h2>New Account:</h2>
					<li>
						<input type="text" name="first_name"  placeholder="First Name" />
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li>
					<li>
						<input type="text" name="last_name"   placeholder="Last Name" />
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text" name="reg_email" placeholder="Email" />
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="reg_pass" placeholder="Password" />
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="reg_pass_confirm"   placeholder="Confirm Password" />
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text" name="phone"  placeholder="Phone Number" />
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li>
					<input type="submit" name="create" onclick="myFunction()" value="Create Account">
						<div class="clear"> </div>
				</ul>
				<ul class="right-form">
					<h3>Login:</h3>
					<div>
						<li><input type="text" name="log_email"  placeholder="Email" /></li>
						<li> <input type="password" name="log_pass" placeholder="Password" /></li>
						<h4><a href="forgot.php">I forgot my Password!</a></h4>
						<input type="submit" name="login" onclick="myFunction()" value="Login" >
					</div>
					<div class="clear"> </div>
				</ul>
				<div class="clear"> </div>
					
			</form>
			
		</div>
		<div class="content-bottom">
<div class="wrap">
			<div class="box-unit">
				<?php global $connection; 
							$sql = "select * from home where content_id = '3a' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
				<h1><?php echo $result['title']; ?></h1><p><?php echo $result['body']; ?></p></div>
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<?php global $connection; 
							$sql = "select * from home where content_id = '3b' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
					<div class="bottom-grid">
					  <img id="circle" src="../images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
					  <h3><?php echo $result['title']; ?></h3>
					</div>
					<div class="service-box"><?php echo $result['body']; ?></div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<?php global $connection; 
							$sql = "select * from home where content_id = '3c' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
					<div class="bottom-grid">
					  <img id="circle" src="../images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
					  <h3><?php echo $result['title']; ?></h3>
					</div>
					<div class="service-box"><?php echo $result['body']; ?></div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<?php global $connection; 
							$sql = "select * from home where content_id = '3d' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
					<div class="bottom-grid">
					  <img id="circle" src="../images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
					  <h3><?php echo $result['title']; ?></h3>
					</div>
					<div class="service-box"><?php echo $result['body']; ?></div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<?php global $connection; 
							$sql = "select * from home where content_id = '3e' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
					<div class="bottom-grid">
					  <img id="circle" src="../images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
					  <h3><?php echo $result['title']; ?></h3>
					</div>
					<div class="service-box"><?php echo $result['body']; ?></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="wrap">
			<div class="section group">
				<div class="col_1_of_footer span_1_of_footer">
						<?php global $connection; 
							$sql = "select * from home where content_id = '4a' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
				    <div class="location">
				    	<h3><?php echo $result['title']; ?></h3>
				    	<ul>
				    		 <p><?php echo $result['body']; ?></p>
						 </ul>
				    </div>			
				</div>
				 <div class="col_1_of_footer span_1_of_footer">
						<?php global $connection; 
							$sql = "select * from home where content_id = '4b' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
				    <div class="location">
				    	<h3><?php echo $result['title']; ?></h3>
				    	<ul>
				    		 <p><?php echo $result['body']; ?></p>
						 </ul>
				    </div>			
				</div>
				 <div class="col_1_of_footer span_1_of_footer">
						<?php global $connection; 
							$sql = "select * from home where content_id = '4c' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
				    <div class="location">
				    	<h3><?php echo $result['title']; ?></h3>
				    	<ul>
				    		 <p><?php echo $result['body']; ?></p>
						 </ul>
				    </div>			
				</div>
				<div class="col_1_of_footer span_1_of_footer">
						<?php global $connection; 
							$sql = "select * from home where content_id = '4d' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
				    <div class="location">
				    	<h3><?php echo $result['title']; ?></h3>
				    	<ul>
				    		 <p><?php echo $result['body']; ?></p>
						 </ul>
				    </div>			
				</div>
						  <div class="clear"></div>
			   </div>
		   </div>
	</div>
	
</body>
</html>