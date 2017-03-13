<?php
session_start();
define("USER_NAME", "iwa");
define("PASSWORD", "toorToor123#");
define("SERVER_ADDRESS", "localhost");
define("DATABASE", "iwa");
$webRoot="http://".$_SERVER['HTTP_HOST']."";
 ini_set('display_errors', 'Off'); 
define('MYSQL_BOTH',MYSQLI_BOTH);
define('MYSQL_NUM',MYSQLI_NUM);
define('MYSQL_ASSOC',MYSQLI_ASSOC);
/*if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    if(!headers_sent()) {
        header("Status: 301 Moved Permanently");
        header(sprintf(
            'Location: https://%s%s',
            $_SERVER['HTTP_HOST'],
            $_SERVER['REQUEST_URI']
        ));
        exit();
    }
}*/
?>
