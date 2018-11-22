<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php

class Person {
	function say_hello(){
		echo "hello from inside a class";
	}
};
	
$person = new Person;
	
$person->say_hello();
?>
	
</body>
</html>