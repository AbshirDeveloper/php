    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
    <meta name="description" content="">

  <!-- stylesheets css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/nivo_themes/default/default.css">

    <link rel="stylesheet" href="css/hover-min.css">
    <link rel="stylesheet" href="css/flexslider.css">

  <link rel="stylesheet" href="css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>
    <div class="preloader">
  <div class="sk-spinner sk-spinner-pulse"></div>
</div>
<div id="header">
<div id="top">
  <?php 
  if($_SESSION['name']){ ?>
  <span id="top_info"><?php echo "Hi,"." ".$_SESSION['name'].". .".". ."." "; ?>   <a href="#">FAQ</a> | <a href="#">Contact Us</a> | <a href="../pages/logout.php">Logout</a><a href="login.php"></a><a href="register.php"></a></span> <?php } else { ?> <span id="top_info"><a href="#">FAQ</a> | <a href="#">Contact Us</a> | <a href="login.php">Log In</a> | <a href="register.php">Register</a></span> <?php } ?>
</div>
<center>
<img id="sawir" src="../data/tobon.jpg">	
<img id="sawi" src="../data/sideed.jpg">
<img id="sawi" src="../data/sagaal.jpg">
<img id="saw" src="../data/kowya.jpg">			
<script>
var divwe = document.getElementById('sawir');
var imagearray = ["../data/kow.jpg", "../data/labo.jpg", "../data/sadex.png", "../data/afar.jpg", "../data/shan.jpg"];
var imageindex = 0;
function abshir(){
  divwe.setAttribute("src", imagearray[imageindex]);
  imageindex++;
  if(imageindex >= imagearray.length){
    imageindex = 0;
  }
};
setInterval(abshir,2000);

var dive = document.getElementById('saw');
var imagearraye = ["../data/kow.jpg", "../data/labo.jpg", "../data/sadex.png", "../data/afar.jpg", "../data/shan.jpg"];
var imageind = 0;
function ahmed(){
  dive.setAttribute("src", imagearraye[imageind]);
  imageind++;
  if(imageind >= imagearraye.length){
    imageind = 0;
  }
};
setInterval(abshir,2000);
setInterval(ahmed,2000);
</script>
<script>
var divwe = document.getElementById('sawir');
var imagearray = ["../data/kow.jpg", "../data/labo.jpg", "../data/sadex.png", "../data/afar.jpg", "../data/shan.jpg"];
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
</center>
</div>
<!-- javscript js -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.backstretch.min.js"></script>

<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>

<script src="js/jquery.flexslider-min.js"></script>

<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>

<script src="js/custom.js"></script>