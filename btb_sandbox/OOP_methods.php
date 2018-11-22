<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
	
// in here the word METHOD means the function

class Person {
	function say_hello(){
		echo "hello from inside a class";
	}
};
	
//by using the function get_class_methods('class_name') you are trying to get all the functions in the class
	
$methods = get_class_methods('person');
	
foreach($methods as $abshir) {
	echo "$abshir </br>";

}
	
/* by using the method_exists('class_name', 'method_name OR the function name withoug the parantheses') in an (if) statement to check if a method or function exists in a class */
	
if(method_exists('Person', 'say_hello')) {
	echo "good";
} else {
	echo "bad";
}
	
?>
	
</body>
</html>