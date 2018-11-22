<?php
if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

require_once("PHPMailer/PHPMailerAutoload.php");

$im = new PHPMailer;
$im->isSMTP();
$im->SMTPAuth = true;
// $im->SMTPDebug = 2;

$im->Host = 'smtpout.secureserver.net';
$im->Username = 'ajama26@techsom.info';
$im->Password = 'Abshir@26';
// $im->SMTPSecure = 'ssl';
$im->Port = 80;

$im->From = $email;
$im->FromName = 'Techsom';
$im->AddReplyTo($email, 'Reply Address');
$im->addAddress('ajama26@techsom.info');

$im->Subject = 'Customer ayaa kaala soo xiriiay webka techsom.info';
$im->Body = $message;
$im->AltBody = "";

$placed = $im->send();
?>

<script>
  
window.alert("Waan Helnay fariintaadii. Waad ku mahadsantahay deg deg ayaan kuula soo xiriiri doonnaa insha allah");

</script>

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
  <!--   this is the slikder -->
  	<link rel="stylesheet" href="css/flexslider.css"> 

  	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- Preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Home section -->
<section id="home" class="parallax-section">
  <div class="gradient-overlay"></div>
    <div class="container">
      <div class="row">
      <style>
        #mid {
          float: right;
        }
        #kor {
          color: white;
          margin-top: 260px;
        }
        #footer {
          background-color: black;
          color: white;
        }
        #green {
          background-color: green;
          color: black;
        }
      </style>
          <div>
              <h1 id="kor" class="wow fadeInUp" data-wow-delay="0.6s"></h1>
              <p class="wow fadeInUp" data-wow-delay="1.0s">.</p>
              <p class="wow fadeInUp" data-wow-delay="1.0s">.</p>
              <p class="wow fadeInUp" data-wow-delay="1.0s">.</p>
              <a id="mid" href="Web/register.php" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll" data-wow-delay="1.3s">Register</a>
              <a id="mid" href="login.php" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll" data-wow-delay="1.3s">Login</a>
          </div>

      </div>
    </div>
</section>


<!-- Navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">

    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">Techsom.info</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#top" class="smoothScroll">Home</a></li>
<li><a href="#about" class="smoothScroll">About</a></li>
 <li><a href="#contact" class="smoothScroll">Contact</a></li>
   </ul>
    </div>

  </div>
</div>

<!-- About section -->
<section id="about" class="parallax-section">
	<div class="container">
		<div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
          <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
            <h2>Ku Saabsan Techsom</h2>
            <h4>Xisaabiyahaaga Gaarka Ah</h4>
          </div>
      </div>

      <div class="clearfix"></div>
      
      <div class="wow fadeInUp col-md-3 col-sm-5" data-wow-delay="0.3s">
        <img src="images/sidecal.jpg" class="img-responsive" alt="About">
        <h6>Ugu horayntii waxaan kaaga mahad celinayaa inaad soo booqatay techsom.info. Waxaan kuu haynaa adeegyo ay hubaal tahay inay ku farxad galin doonaan insha allah. Waxyaabaha aan ku faanayno hadii aanu nahay Techsom waxaa kamid ah inaan kaa caawin karno in daymaha aad ku leedahay customerkaaga aan si hufan oo xisaabtan laho kuula socodsiinayno. Customer kaagu waxay helayaan fariimo xasuusimo ah markii ay la daahayn daymaha. Waxay kaloo helayaan qoraal mahad naq ah markii ad xiligeeda ku bixyaa. Adeegaasi waa qayb yar oo kamid ah adeegyada baaxadda weyn ee aan kuu haynno. Waxaan filaynayaa inaad ku farxi doontid adeegeena ee fadlan kusoo biir bahda techsom. Mahadsanid</h6>
      </div>

      <div class="wow fadeInUp col-md-5 col-sm-7" data-wow-delay="0.5s">

        <!-- flexslider -->
        <div class="flexslider">
          <ul class="slides">

            <li>
              <img src="images/dayn.jpg" alt="Flexslider">
            </li>
            <li>
              <img src="images/amaano.jpg" alt="Flexslider">
            </li>
            <li>
              <img src="images/lasoco.png" alt="Flexslider">
            </li>

          </ul>
        </div>

         <p>Astanteenu waa inaan kaaga filnaano baahiyahaaga xisaabeed idilkood</p>
      </div>

       <div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="0.9s">
        	<h2>Xisaabi Xil Maleh</h2>
         	<p>Waxaan Kuu xisaabinaynaa dhamaan qaybaha kala duwan ee ganacsigaaga si ku qancin doonta. Adeegyada aan ku hayno aadbay u tira badanyihiin. hadii aan wax yar ka jaleecno<a rel="nofollow" href="http://www.tooplate.com/free-templates" target="_blank"></a></p>
         	<p>Waxaa Kamid ah:</p>
         	
            <ul>
                <li>Gaditaanka Badeecadaada</li>
                <li>Xisaabitanka badeecada aa gaday maalinkaas ama isbuucaas ama bishaas</li>
                <li>Lasocod daymaha kaamqan si habsi iyo xasuusin leh</li>
                <li>Iskuxir adiga iyo shaqaalahaaga</li>
                <li>Samayska invoice ka</li>
         	</ul>
          <p>Maahan intaas oo kaliyah, Si aad u aragtid adeegeena oo dhamaystiran, fadlan kusoo biir bahda Techsom<a rel="nofollow" href="http://www.tooplate.com/free-templates" target="_blank"></a></p>
      </div>

		</div>
	</div>
</section>


<!-- Video section -->
<section id="video" class="parallax-section">
  <div class="overlay"></div>
    <div class="container">
      <div class="row">

          <div class="col-md-offset-2 col-md-8 col-sm-12">
              <a class="popup-youtube" href="#"><i class="fa fa-play"></i></a>
              <h2 class="wow fadeInUp" data-wow-delay="0.5s">Daawo Videogaan si aad ufahantid adeegyadeena kala duwan</h2>
              <p class="wow fadeInUp" data-wow-delay="0.8s">Waxaa dhici karta inuusan kuu shaqayn muuqaalka videogan sababtoo ah ingineeradeena ayaa waxay si habsami leh ugu mashquulsanyihiin sidii ay u samayn lahaayeen muuqaal si buuxda uga turjumaya techsom</p>
          </div>

      </div>
    </div>
</section>
<!-- Contact section -->
<section id="contact" class="parallax-section">
  <div class="overlay"></div>
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
            <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                <h2>Nala Xiriir</h2>
                <h4>Marwalba Diyaar ayaan u nahay adeegaaga</h4>
            </div>
        <div class="contact-form wow fadeInUp" data-wow-delay="0.7s">
          <form id="contact-form" method="post" action="c_contact.php">
            <input name="name" type="text" class="form-control" placeholder="Magacaaga" required>
            <input name="email" type="email" class="form-control" placeholder="Emailkaaga" required>
            <textarea name="message" class="form-control" placeholder="Fariin" rows="5" required></textarea>
            <input id="green" name="send" type="submit" class="form-control submit" value="Dir Fariintaada">
          </form>
				</div>
			</div>
			
		</div>
	</div>
</section>

<!-- Footer section -->
<footer id="footer">
	<div class="container">
		<div class="row">

              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay=".3s">
                <h3>Techsom.info</h3>
                <p>Waxaa mahad iskaleh Allah oo noo suurta galiyay inaan adeegaan usoo bandhigno umada somaliyeed. Waxaan ilaahay ka baryaynaa inuu noqdo mud ku anfaca dadbadan. Fadlan hadii aad u bogtid adeegeena, lawadaag saaxibadaa iyo dadka aan umalaynaysid inay iyaguna ka faa iidaysan karaan. Mahadsanidiin</p>
              </div>  
        
              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay=".6s">
                <h3>Waxaad naga heli kartaa</h3>
                <p>4359 N Elston Ave, Chicago il 60641</p>
                <p>312-409-3514</p>
                <p>ajama2@techsom.info</p>
              </div> 
        
              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay=".9s">
                <h3>Si kooban Waxyaabaha aan kuu hayno</h3>
                <strong>Xisaabin xawaaladeed</strong>
                <p>Xisaabin Delivery ama shipping</p>
                <strong>Xalaal ama grocery store</strong>
                <p>Dhamaan baahiyaha kala duwan ee tukaankaaga</p>
              </div> 

		</div>
	</div>


<!-- Copyright section -->
<section id="copyright">
  <div class="container">
    <div class="row">

      <div class="col-md-8 col-sm-8 col-xs-8">
        <p>Copyright © 2017 Techsom - Designed by Abshir Jama<a class="designed-by" href="https://plus.google.com/+Tooplate/" target="_blank"></a></p>
      </div>  

      <div class="col-md-4 col-sm-4 text-right">
        <a href="#home" class="fa fa-angle-up smoothScroll gototop"></a>
      </div>

    </div>
  </div>
</section>
</footer>

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

</body>
</html>
<?php
  } else {
    header("location: index.html");
  }
?>

