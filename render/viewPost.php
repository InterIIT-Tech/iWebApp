<?php
require_once('api/api.php');
require_once('servConf.php');
/**
 * Login
 */
$post= new postAPI();

echo json_encode($post->getPosts($match[1],$match[2],$match[3]));
// echo $match[1].' 2= '.$match[2].' 3='.$match[3];
// echo "plain text";
?>