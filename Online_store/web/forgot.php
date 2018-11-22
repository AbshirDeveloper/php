<html>
<head>
  <title></title>
</head>
<body>
<?php require_once("../pages/header.php"); ?>
<div id="navigation"><center><?php require_once("../pages/navigations.php"); ?></center></div>
<div id="page">

<div class="login-page">
  <div class="form">
    <form id="class" class="login-form" action="" method="post">
    <span id="red"></span>
    <br/>
    <br/>
      <input id="kow" type="text" name="first_name" placeholder="First name"/>
      <input id="labo" type="text" name="email" placeholder="Email address"/>
      <input id="green" type="submit" name="retreive" value="RETREIVE">
      <p class="message">OR <a href="login.php">LOGIN</a></p>
      <script type="text/javascript" src="../data/js.js"></script>
    </form>
  </div>
</div>
</div>
<?php require_once("../pages/footer.php"); ?>
</body>
</html>