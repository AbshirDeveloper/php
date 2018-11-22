<html>
<head>
    <title>basic</title>
</head>
<body>
	
<?php
echo ("SERVER NAME:" . " " .  $_SERVER['SERVER_NAME']) . "</br>";
echo ("SERVER ADDRESS:" . " " .  $_SERVER['SERVER_ADDR']) . "</br>";
echo ("SERVER PORT:" . " " .  $_SERVER['SERVER_PORT']) . "</br>";
echo ("SERVER DOCUMENT ROOT:" . " " .  $_SERVER['DOCUMENT_ROOT']) . "</br>";
	
	
echo "<hr />";
	
echo "page details: </br>";
	
echo "page self:" . " " . $_SERVER['PHP_SELF'] . "<br/>";
echo "page file_name:" . " " . $_SERVER['SCRIPT_FILENAME'] . "<br/>";

echo "request details: </br>";

$abshir = $_SERVER['REQUEST_TIME'];
	
echo "REMOTE ADDRESS:" . " " . $_SERVER['REMOTE_ADDR'] . "</br>";
echo "REMOTE PORT:" . " " . $_SERVER['REMOTE_PORT'] . "</br>";
echo "REQUEST URI:" . " " . $_SERVER['REQUEST_URI'] . "</br>";
echo "QUERY STRING :" . " " . $_SERVER['QUERY_STRING'] . "</br>";
echo "REQUEST METHOD:" . " " . $_SERVER['REQUEST_METHOD'] . "</br>";
echo "REQUEST TIME:" . " " . strftime("%m/%d/%y %H:%M:%S", $abshir) . "</br>";
echo "HTTP REFERER:" . " " . $_SERVER['HTTP_REFERER'] . "</br>";
echo "HTTP USER AGENT:" . " " . $_SERVER['HTTP_USER_AGENT'] . "</br>";
?>
	
</body>
</html>