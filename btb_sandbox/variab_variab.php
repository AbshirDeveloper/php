<html>
<head>
    <title>basic</title>
</head>
<body>
	<?php
	/* what is this doing is that it takes the string of the first variable and uses it as a variable to look for the value of a variable that has name that is identical to the string of the first variable */
	
	$a = "hello";
	$hello = "hello everyone";

	echo $a . "</br>";
	echo $hello . "</br>";
	
	echo $$a . "</br>";

	?>
</body>
</html>