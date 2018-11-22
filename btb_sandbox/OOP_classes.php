<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php

class Person {
	
}
	
//$classes = get_declared_classes();
	
//foreach($classes as $class) {
	//echo "$class </br>";
//};
	
if(class_exists("Person")) {
	echo "good";
} else {
	echo "bad";
}
?>
	
</body>
</html>