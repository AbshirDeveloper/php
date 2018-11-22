<!DOCTYPE html>
<html>
<head>
	<title>SomTruck</title>
	<link rel="stylesheet" type="text/css" href="../data/public.css">
  <script type="text/javascript" src="../data/js.js"></script>
</head>
<body>
<div id="page">
<div class="login-page">
  <div class="form">
  <span id="red"></span>
    <form id="class" class="login-form" action="../pages/register_member.php" method="post">
     <span id="red"></span>
    <br/>
    <br/>
      <input id="kow" type="text" name="first_name" placeholder="First name"/>
      <input id="labo" type="text" name="last_name" placeholder="Last name"/>
      <input id="sadex" type="text" name="username" placeholder="Username"/>
      <input id="afar" type="password" name="password" placeholder="Password"/>
      <input id="shan" type="password" name="confirm_password" placeholder="Confirm Password"/>
      <input id="lix" type="text" name="email" placeholder="Email address"/>
      <input id="green" type="submit" name="create" value="CREATE">
      <p class="message">Registered? <a href="login.php">Login</a></p>
      <script type="text/javascript" src="../data/js.js"></script>
    </form>
  </div>
</div>
</div>
</body>