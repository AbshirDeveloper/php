<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_logged_in(); ?>
<?php
function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}
function validate_presences($required_fields) {
  global $errors;
  foreach($required_fields as $field) {
    $value = trim($_POST[$field]);
  	if (!has_presence($value)) {
  		$errors[$field] = fieldname_as_text($field) . " can't be blank";
  	}
  }
}

$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_admin = attempt_login($username, $password);

    if ($found_admin) {
      // Success
			// Mark user as logged in
			$_SESSION["admin_id"] = $found_admin["id"];
			$_SESSION["username"] = $found_admin["username"];
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
<html>
	<head>
		<title> Practice Page </title>
        <link rel="stylesheet" type="text/css" href="main.css">
		
	</head>
	<body>
        <div id="header">
        </div>
         <div id="next">
                <h6 id="log"><a href="register.php"><button> Register </button></a>
                    </h6> 
            
            </div>

        <div id="login">
            <h3> Fadlan gali PASSWORD and USERNAME </h3>
            
            <form action="practice.php" method="post">
            username: <input type="text" name="username" value="";> <br />
            password: <input type="password" name="password" value="";> <br />
            submit: <input type="submit" name="submit" vavlue="submit";>
            
            
            </form>
        </div>
        <div>
        
        </div>
        
        <div>
        
        </div>
	
	
	</body>




</html>

