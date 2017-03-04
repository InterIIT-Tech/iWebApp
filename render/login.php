<?php
require_once('api/api.php');
require_once('servConf.php');
/**
 * Login
 */
$apiObj= new userAPI($webRoot);
echo json_encode($apiObj->checkAuth($_POST['username'],$_POST['pswd']));
 
// echo "plain text";
?>