<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
class Student {
	
	//in here you declared this variable as static because you will be able to access it without creating instance
	static $total_students = 0;
	
	// this function is also static and it can be called withoug declaring and instance
	static public function add_student() {
		Student::$total_students++;
		return Student::$total_students;
	}
	
	static function welcome_students($var = "hello sutudents") {
		echo "{$var}";
	}
}

	//here you go, you called both the variable and funcion withoug creating and instance
echo Student::$total_students . "</br>";
echo Student::add_student();

?>
	

</body>
</html>