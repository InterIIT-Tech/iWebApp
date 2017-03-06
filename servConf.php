<?php
session_start();
define("USER_NAME", "root");
define("PASSWORD", "toor");
define("SERVER_ADDRESS", "localhost");
define("DATABASE", "iwa");
$webRoot="http://".$_SERVER['HTTP_HOST']."/iwa";
ini_set('display_errors', 'Off'); 
define('MYSQL_BOTH',MYSQLI_BOTH);
define('MYSQL_NUM',MYSQLI_NUM);
define('MYSQL_ASSOC',MYSQLI_ASSOC);
?>
