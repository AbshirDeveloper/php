<?php require_once("../data/sessions.php"); ?>
<div id="header">
<img id="sawir" src="../data/geel.jpg">	
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
<?php if(isset($_SESSION['name'])){
?>
<div id="customer">
Welcome <b id="magac"><?php echo $_SESSION['name'].", "." "." "." ".".."; ?></b><button id="referal">Refer?</button><a href="../pages/logout.php"><button id="referal">Logout</button></a>
</div>
<?php
} else {
?>
<div id="customer">
<button id="referal">Refer?</button><a href="../web/login.php"><button id="referal">Login</button></a>
</div>
<?php
}
?>
</div>