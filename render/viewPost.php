x<?php
require_once('api/api.php');
require_once('servConf.php');
/**
 * Login
 */
$post= new postAPI();

echo json_encode($post->getPosts($_POST['scope'],$_POST['from'],$_POST['to'],10));

?>