<?php
require_once('api/api.php');
require_once('servConf.php');
/**
 * Login
 */
$regUser= new userAPI($webRoot);
echo json_encode($regUser->regUser($_POST['name'],0,$_POST['uAlias'],$_POST['pswd'],$_POST['email']));
 
// echo "plain text";
?>