<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
echo time();
echo "<br />";
echo mktime(2, 30, 45, 10, 1, 2009);
echo "<br />";
//checkdate
echo checkdate(12,31,2009)? 'true' : 'false';
echo "<br />";
echo checkdate(2,31,2009)? 'true' : 'false';
echo "<br />";
	
$unix_timestamp = strtotime("last monday");
echo $unix_timestamp. "<br />";
?>
	
</body>
</html>