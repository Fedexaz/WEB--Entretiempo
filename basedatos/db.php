<?php 

date_default_timezone_set('America/Argentina/San_Juan');

define("USER", "root");
define("PASS", "");
define("HOST", "localhost");
define("DB", "estats_futbol");

$mysqli = new mysqli(HOST, USER, PASS, DB);

$search  = array('TRUNCATE', 'DROP', 'ALTER', 'EXECUTE', 'DELETE', 'BOSHAR', '-1');
$replace = array(' ', ' ', ' ', ' ', ' ', 'DELETE', ' ');

//var_dump(str_replace($search, $replace, "BOSHAR"));

?>