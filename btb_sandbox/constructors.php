<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
class a {
	public $mid;
	static public $student_count = 0;
/* you need to understand that this __construct 
thing takes those arguments executes them and then 
returns to the class attributes and constructs the with the new information 
*/
	function __construct(){
		$this->mid = 4 . "</br>";
		a::$student_count++;
	}
}
		
$abshir = new a();	
echo a::$student_count . "</br>";
 
$ahmed = new a();
echo a::$student_count . "</br>";
	
$ali = new a();
echo a::$student_count . "</br>";
	

?>
	

</body>
</html>