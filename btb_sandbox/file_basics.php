<?php

echo __FILE__ . "</br>";
echo __LINE__ . "</br>";
echo __DIR__ . "</br>";
echo dirname(__FILE__) . "</br>";
echo file_exists(dirname(__FILE__)) ? 'yes' : 'no';
echo "<br />";
echo file_exists(dirname(__FILE__ ). "/basic.html") ? 'yes' : 'no' . "</br>";
echo "<br />";
echo is_dir(dirname(__FILE__)) ? "yes" : "no" ;
echo "<br />";
echo is_dir(dirname(__FILE__)."/basic.html") ? "yes" : "no" ;
echo "<br />";


$abshir =  fileowner("file_permissions.php");
$owner_array = posix_getpwuid($abshir);
echo $owner_array['name'];
?>