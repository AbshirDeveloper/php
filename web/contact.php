<?php require_once('connect.php');

if(isset($_GET['id']) && $_GET['id'] == 'sent'){
	?>
<script>

	window.alert("We have received your email and will contact you ASAP, thank you");
</script>

<?php
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
<title>Free Brighton Website Template | Contact :: w3layouts</title>
<link href="register/css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.min.js"></script>
</head>
<body>
	<style>
		#red{
			color: red;
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
						<li class=""><a href="index">Home</a></li>
						<li class=""><a href="about">About</a></li>
						<li class=""><a href="vision">Vision</a></li>
						<li class=""><a href="objectives">Objectives</a></li>
						<li class=""><a href="register/index.php">Membership</a></li>
						<li class="active"><a href="contact">Contact Us</a></li>
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
				<br />
			   <div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="post" action="register/mailer.php">
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-Mail</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Mobile</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Subject</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="email" value="Submit"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_contact">
					<?php global $connection; 
					$sql = "select * from contact ORDER BY id DESC limit 1";
					$query = mysqli_query($connection, $sql);
					$result = mysqli_fetch_array($query);
					?>
<!--
					<div class="contact_info">
    	 				<h2>Find Us Here</h2>
					    	  <div class="map">
							   	    <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/place/Somalia/@5.147455,41.7053656,6z/data=!3m1!4b1!4m5!3m4!1s0x181d2ea7ecd15b83:0x9e393ace5ce9e5be!8m2!3d5.152149!4d46.199616?hl=en"></iframe><br><small><a href="https://www.google.com/maps/place/Somalia/@5.147455,41.7053656,6z/data=!3m1!4b1!4m5!3m4!1s0x181d2ea7ecd15b83:0x9e393ace5ce9e5be!8m2!3d5.152149!4d46.199616?hl=en" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
							  </div>
      				</div>
-->
      			   <div class="company_address">
				     	<h2>Address</h2>
					   <?php global $connection; 
					$sql = "select * from contact ORDER BY id DESC limit 1";
					$query = mysqli_query($connection, $sql);
					$result = mysqli_fetch_array($query);
					?>
						    	<p><?php echo $result['address']; ?></p>
				   		<p>Phone: <?php echo $result['phone']; ?></p>
				 	 	<p>Email: <span><?php echo $result['email']; ?></span></p>
				   		<p>Follow us on: <a href="<?php echo $result['f_link']; ?>">Facebook</a>, <a href="<?php echo $result['t_link']; ?>">Twitter</a>, <a href="<?php echo $result['y_link']; ?>">Youtube</a></p>
				   </div>
				 </div>
				 <div class="clear"></div> 	
			  </div>
			</div>
		 </div>
	</div>
	<style>
	#circle {
  		border-radius: 50%;
		}
	
	</style>
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