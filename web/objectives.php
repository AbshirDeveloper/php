<?php require_once('connect.php') ?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Brighton Website Template | Services :: w3layouts</title>
<link href="register/css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.min.js"></script>
</head>
<body>
	<style>
		#red {
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
						<li class="active"><a href="objectives">Objectives</a></li>
						<li class=""><a href="register/index.php">Membership</a></li>
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
			    <div class="col_1_of_3 grid_1_of_3">
					<?php global $connection; 
					$sql = "select * from objectives where content_id = '1a' ORDER BY id DESC limit 1";
					$query = mysqli_query($connection, $sql);
					$result = mysqli_fetch_array($query);
					?>
					<h2><?php echo $result['title']; ?></h2>
					<img src="images/<?php echo $result['image']; ?>" alt="">
					<p><?php echo $result['body']; ?></p>
				</div>
				<div class="col_1_of_3 grid_1_of_3">
					<?php global $connection; 
					$sql = "select * from objectives where content_id = '1b' ORDER BY id DESC limit 1";
					$query = mysqli_query($connection, $sql);
					$result = mysqli_fetch_array($query);
					?>
					<h2><?php echo $result['title']; ?></h2>
				 <div class="history-desc"><br />
					<?php global $connection; 
					$sql = "select * from objectives where content_id = '1c' ORDER BY id asc limit 8";
					$query = mysqli_query($connection, $sql);
					while($result = mysqli_fetch_array($query)){
					?>
					<div class="year"><p><?php echo $result['title']; ?></p></div>
					<p class="history"><?php echo $result['body']; ?></p>
					 <?php
					}
					 ?>
				 <div class="clear"></div>
				</div>
			</div>
				
				<div class="col_1_of_3 grid_1_of_3">
					<h2>Our Services</h2>
					<p>Further, to this, our most priority interventions are infrastructure improvement, primary health care, formal/non-formal education, water, hygiene/sanitation, environmental conservation and peace building programs, as these are most prioritized needs of Somali population in general and that of Puntland Communities in particular, as well as we selected most venerable groups of the community and the organization aimed to facilitate sustainable development projects.
					</p>
				    <div class="list">
					     <ul>
					     	<li><a href="#">Adeqaute and all tiem availeble response system</a></li>
					     	<li><a href="#">Improvment of the dormant infrastracture in state-wide level</a></li>
					     	<li><a href="#">Health sector /HIV AIDS and the eradication of other lethal diseases</a></li>
					     	<li><a href="#">Education</a></li>
					     	<li><a href="#">Water and Sanitation</a></li>
					     	<li><a href="#">Environmentn , urbanization and Natural Resource Management</a></li>
					     	<li><a href="#">Peace strengthening and reconciliation</a></li>
					     	<li><a href="#">Develoment of gender equity</a></li>
					     	<li><a href="#">Eradication of most horrible social outdated practice like FGM, women degradation, clan superamcy ect</a></li>
					     	<li><a href="#">Community mobilization of all aspects of thier development/needs</a></li>
					     </ul>
					 </div>
					 <p>Honesty and Transparency, for being accountable for the effectiveness of HOGOL NGO actions, open judgment when seen necessary which will be open communication with others. Solidarity with poor and marginalized people, so that HOGOL principles will be a commitment to the interests of the poor, thus, HOGOL8 is smartly affording to face the courage of conviction, notwithstanding the values and morals of its target groups/Beneficiaries.</p>
					<div class="list">
					<ul>
					<li><a href="#">Mutual respect, recognizing the innate dignity of all people and value of diversity.</a></li>
					<li><a href="#">Promotion of social equity and Justice, in terms of working chances and ensuring that everyone — irrespective of sex, age, race, color, class and religion — has equal opportunity for expressing and utilizing their potential.</a></li>
					</ul>
						</div>
				</div>
				 <div class="clear"></div> 	
			</div>
		 </div>
	</div>
	<div class="content-middle">
		<div class="wrap">
			<div class="section group">
				<div class="lsidebar span_1_of_3">
					  <?php global $connection; 
				$sql = "select * from home where content_id = '2a' ORDER BY id DESC limit 1";
				$query = mysqli_query($connection, $sql);
				$result = mysqli_fetch_array($query);
				?>
				      <h3><span><?php echo $result['title']; ?></span></h3>
					  <p><?php echo $result['body']; ?></p>
				</div>
					<div class="cont span_2_of_3">
				       <div class="section group example">
							<div class="col_1_of_2 span_1_of_2">
							<?php global $connection; 
							$sql = "select * from home where content_id = '2b' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
							<div class="icon">
								<img src="images/<?php echo $result['image']; ?>" width="30">
							</div>
							  <div class="heading">
							   <h3><a href="#"><?php echo $result['title']; ?></a></h3>
							   <p><?php echo $result['body']; ?></p>
			 				   </div>
			 				   <div class="clear"></div>
			 				</div>
							<div class="col_1_of_2 span_1_of_2">
							<?php global $connection; 
							$sql = "select * from home where content_id = '2c' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
							<div class="icon">
								<img src="images/<?php echo $result['image']; ?>" width="30">
							</div>
							  <div class="heading">
							   <h3><a href="#"><?php echo $result['title']; ?></a></h3>
							   <p><?php echo $result['body']; ?></p>
			 				   </div>
			 				   <div class="clear"></div>
			 				</div>
		    			</div>	
		    			 <div class="section group example">
							<div class="col_1_of_2 span_1_of_2">
							<?php global $connection; 
							$sql = "select * from home where content_id = '2d' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
							<div class="icon">
								<img src="images/<?php echo $result['image']; ?>" width="30">
							</div>
							  <div class="heading">
							   <h3><a href="#"><?php echo $result['title']; ?></a></h3>
							   <p><?php echo $result['body']; ?></p>
			 				   </div>
			 				   <div class="clear"></div>
			 				</div>
							<div class="col_1_of_2 span_1_of_2">
							<?php global $connection; 
							$sql = "select * from home where content_id = '2e' ORDER BY id DESC limit 1";
							$query = mysqli_query($connection, $sql);
							$result = mysqli_fetch_array($query);
							?>
							<div class="icon">
								<img src="images/<?php echo $result['image']; ?>" width="30">
							</div>
							  <div class="heading">
							   <h3><a href="#"><?php echo $result['title']; ?></a></h3>
							   <p><?php echo $result['body']; ?></p>
			 				   </div>
			 				   <div class="clear"></div>
			 				</div>
		    			</div>			    
				    </div>	
				     <div class="clear"></div>			
		   		</div>
		</div>
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
					  <img id="circle" src="images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
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
					  <img id="circle" src="images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
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
					  <img id="circle" src="images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
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
					  <img id="circle" src="images/<?php echo $result['image']; ?>" width="130" height="100" alt=""/>
					  <h3><?php echo $result['title']; ?></h3>
					</div>
					<div class="service-box"><?php echo $result['body']; ?></div>
				</div>
				<div class="clear"></div>
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