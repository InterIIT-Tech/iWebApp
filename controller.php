<?php
include_once('api.php');
include_once('servConf.php');
/**
 * Controller
 */
if(!isset($_GET['a'])){$_GET['a']='';}
$action=$_GET['a'];
$apiObj= new userAPI($webRoot);
switch ($action) {
	case 'regUser':
		return $apiObj->regUser($_POST['username'],$_POST['pswd'],$_POST['user_role']);
		break;
	case 'uAuth':
		return $apiObj->checkAuth($_POST['username'],$_POST['pswd']);
		break;
	
	default:
		echo json_encode([-1,"Invalid action"]);
		exit;

		break;
}
?>