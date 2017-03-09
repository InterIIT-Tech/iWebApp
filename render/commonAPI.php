<?php
require_once('api/api.php');
require_once('servConf.php');
/**
 * Common API gateway
 */
$action = $match[1];
$userAPI= new userAPI($webRoot);
$post= new postAPI();
$subs= new subsAPI();

switch($action){
	//userAPI
	case "userLogin":
		echo json_encode($userAPI->checkAuth($_POST['username'],$_POST['pswd']));
		break;
	case "regUser": 
		echo json_encode($userAPI->regUser($_POST['name'],$_POST['role']=0,$_POST['uAlias'],$_POST['pswd'],$_POST['email']));
		break;
	case "newPost":
		$post->newPost($_POST['title'],$_POST['content'],$_POST['type'],1,$_POST['notice'],$_POST['priority'],$_POST['image'],$_POST['notify'],$_POST['audience']);
		break;
	case "viewPost"://need seperate
		//some rendering reequired
		echo json_encode($post->getPosts($match[2],$match[3],$match[4]));
		break;
	case "getCourse"://need seperate
		//some rendering reequired
		echo json_encode($subs->viewCourses(1));//$_SESSION['uYear']
		break;
	case "Subs"://need seperate
		//some rendering reequired
		echo json_encode($subs->subscribe($_POST['type'],$_POST['code']));//$_SESSION['uYear']
		break;
	case "unSubs"://need seperate
		//some rendering reequired
		echo json_encode($subs->unSubscribe($_POST['type'],$_POST['code']));//$_SESSION['uYear']
		break;
	case "checkSub"://need seperate
		//some rendering reequired
		echo json_encode($subs->checkSub($_POST['type']));//$_SESSION['uYear']
		break;
	case "logout":
		$_SESSION['uID']=null;
		$_SESSION['uRole']=null;
		header("Location: ".$webRoot);
		break;

}

 
// echo "plain text";
?>