<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php

class Person {
	var $first_name = "abshir";
	var $last_name = "jama";
	
	var $leg_count = 2;
	var $arm_count = 2;
	
	function full_name() {
		return $this->first_name . " " . $this->last_name;
	}
}
	

class abshir extends Person {
	
}	

$ali = new Person();
$ahmed = new abshir();
	
echo $ahmed->first_name;
echo $ali->first_name;
	
echo "<hr />";
	
echo "person parent:" . get_parent_class('Person') . "</br>";
echo "Abshir parent: " . get_parent_class('abshir') . "</br>";

echo is_subclass_of('abshir', 'person') ? 'true' : 'false';
	echo "<br />";
echo is_subclass_of('person', 'abshir') ? 'true' : 'false';
	

?>
	

</body>
</html>