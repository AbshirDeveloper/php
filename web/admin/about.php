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
<title>Free Brighton Website Template | About :: w3layouts</title>
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
						<li class="active"><a href="about">About</a></li>
						<li class=""><a href="vision">Vision</a></li>
						<li class=""><a href="objectives">Objectives</a></li>
						<li class=""><a href="member_list">Members List</a></li>
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
				<div id="update">
	<div id="update">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<select name="content_id">
	<option>1a</option>
	<option>1b</option>
	<option>1c</option>
	<option>2a</option>
	<option>2b</option>
	</select><br />
	<input type="file" name="fileToUpload" id="fileToUpload"><br />
	<textarea name="title" rows="1" cols="50">Title</textarea><br />	
	<textarea name="body" rows="4" cols="60">Body</textarea><br />		
	<input type="submit" name="about" value="Submit">	
	</form>
	</div>
			 <div class="cont1 span_2_of_a about_desc">
				 <?php global $connection; 
				$sql = "select * from about where content_id = '1a' ORDER BY id DESC limit 1";
				$query = mysqli_query($connection, $sql);
				$result = mysqli_fetch_array($query);
				?>
				       <span id="red">1a</span><h2><?php echo $result['title']; ?></h2>
				 			<div>
						<?php global $connection; 
				$sql = "select * from about where content_id = '1b' ORDER BY id DESC limit 1";
				$query = mysqli_query($connection, $sql);
				$result = mysqli_fetch_array($query);
				?>		
						<span id="red">1b</span>
		    			   <p><span><?php echo $result['title']; ?></span></p>
				           <p><?php echo $result['body']; ?></p>
							</div>
					        <div class="image group">
							   <div class="grid images_3_of_1">
								   <?php global $connection; 
										$sql = "select * from about where content_id = '1c' ORDER BY id DESC limit 1";
										$query = mysqli_query($connection, $sql);
										$result = mysqli_fetch_array($query);
										?>
								<img src="../images/<?php echo $result['image']; ?>" alt="">
								</div>
									<div class="grid span_2_of_1"><span id="red">1c</span>
										<h4><?php echo $result['title']; ?></h4>
											<p><?php echo $result['body']; ?></p>
									          <div class="more">
								         	  <a href="#" class="btn btn-primary">more</a>
								         </div>
							   		</div>
			  				 </div>
				      </div>	
				<div class="lsidebar1 span_1_of_a about_desc">
					 <?php global $connection; 
										$sql = "select * from about where content_id = '2a' ORDER BY id DESC limit 1";
										$query = mysqli_query($connection, $sql);
										$result = mysqli_fetch_array($query);
										?>
				      <span id="red">2a</span><h2><?php echo $result['title']; ?></h2>
				     	<ul class="about-list"><span id="red">2b</span>
								 <?php global $connection; 
										$sql = "select * from about where content_id = '2b' ORDER BY id DESC limit 3";
										$query = mysqli_query($connection, $sql);
										while ($result = mysqli_fetch_array($query)){
										?>
                            <li>
                                <h3><?php echo $result['title']; ?></h3>
                                <p><?php echo $result['body']; ?></p>
                            </li>
							<?php
										}
							?>
                        </ul>
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
								<img src="../images/<?php echo $result['image']; ?>" width="30">
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
								<img src="../images/<?php echo $result['image']; ?>" width="30">
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
								<img src="../images/<?php echo $result['image']; ?>" width="30">
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
								<img src="../images/<?php echo $result['image']; ?>" width="30">
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
					  <div class="grid_icon"><img src="../images/<?php echo $result['image']; ?>" width="80" height="70" alt=""/></div>
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
					  <div class="grid_icon"><img src="../images/<?php echo $result['image']; ?>" width="80" height="70" alt=""/></div>
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
					  <div class="grid_icon"><img src="../images/<?php echo $result['image']; ?>" width="80" height="70" alt=""/></div>
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
					  <div class="grid_icon"><img src="../images/<?php echo $result['image']; ?>" width="80" height="70" alt=""/></div>
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

    	
    	
            