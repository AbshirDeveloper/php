<?php header("location: web/home.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>DurDur</title>
	<link rel="stylesheet" type="text/css" href="data/public.css">
</head>
<body>
<div id="header">
<div id="top">
  <?php 
  if($_SESSION['name']){ ?>
  <span id="top_info"><?php echo "Hi,"." ".$_SESSION['name'].". .".". ."." "; ?>   <a href="#">FAQ</a> | <a href="#">Contact Us</a> | <a href="../pages/logout.php">Logout</a><a href="login.php"></a><a href="register.php"></a></span> <?php } else { ?> <span id="top_info"><a href="#">FAQ</a> | <a href="#">Contact Us</a> | <a href="login.php">Log In</a> | <a href="register.php">Register</a></span> <?php } ?>
</div>
<img id="sawir" src="data/tobon.jpg">	
<img id="sawir" src="data/sideed.jpg">
<img id="sawir" src="data/sagaal.jpg">
<img id="sawir" src="../data/kowya.jpg">			
<script>
var divwe = document.getElementById('sawir');
var imagearray = ["data/kow.jpg", "data/labo.jpg", "data/sadex.png", "data/afar.jpg", "data/shan.jpg"];
var imageindex = 0;
function abshir(){
  divwe.setAttribute("src", imagearray[imageindex]);
  imageindex++;
  if(imageindex >= imagearray.length){
    imageindex = 0;
  }
};
setInterval(abshir,2000);
</script>
<script>
var divwe = document.getElementById('sawir');
var imagearray = ["data/kow.jpg", "data/labo.jpg", "data/sadex.png", "data/afar.jpg", "data/shan.jpg"];
var imageindex = 0;
function abshir(){
  divwe.setAttribute("src", imagearray[imageindex]);
  imageindex++;
  if(imageindex >= imagearray.length){
    imageindex = 0;
  }
};
setInterval(abshir,2000);
</script>
</div>
<div id="navigation">
<center>
<a href="web/home.php"><button id="button">Home</button></a>
<a href="web/about.php"><button id="button">About Us</button></a>
<a href="web/Cart.php"><button id="button">Order</button></a>
<a href="web/How_to.php"><button id="button">How To It Works</button></a>
<a href="web/partners.php"><button id="button">Our Partners</button></a>
<div class="dropdown">
<a href="web/membership.php"><button id="button">Members</button></a>
<div class="dropdown-content">
	<a href="web/membership.php">About Membership</a>
	<a href="web/login.php">Login</a>
	<a href="web/register.php">Register</a>
</div>
</div>
</center>
</div>
<div id="page">
</div>
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Magaca<span>Shirkada</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">Shirkadd &copy; 2015</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>4359 N Elston ave</span> Chicago, IL 60641 United States</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1 (312) 409-3514</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">brotherabshir@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>DurDur</span>
					This is DurDur shipping company which is one of the leading shipping companies in the world. Our excellence is appreciated in almost everywhere in the world.
				</p>

				<div class="footer-icons">

					<a href="https://www.facebook.com/aburamlah.jama"><i class="fa fa-facebook"><img id="face" src="../data/facebook.png"></i></a>
					<a href="#"><i class="fa fa-twitter"><img id="face" src="../data/instagram.jpg"></i></a>
					<a href="#"><i class="fa fa-linkedin"><img id="face" src="../data/youtube.jpg"></i></a>
					<a href="#"><i class="fa fa-github"><img id="face" src="../data/twitter.jpg"></i></a>

				</div>

			</div>

		</footer>

	</body>

</html>

</body>
</html>	