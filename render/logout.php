<?php
session_start();
// require_once('servConf.php');
$_SESSION['uID']=null;
$_SESSION['uRole']=null;
// echo $webRoot;
// echo "lol";
header("Location: ".$webRoot); 
?>