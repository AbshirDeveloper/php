<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'abshir';
$db_pass		= 'abshir26';
$db_database	= 'pharmacy_sales'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>