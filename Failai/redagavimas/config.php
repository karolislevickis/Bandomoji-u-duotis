<?php
//PDO prisijungimas prie DB.
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','duomenys');

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->exec("set names utf8");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

date_default_timezone_set('Europe/Vilnius');

?>