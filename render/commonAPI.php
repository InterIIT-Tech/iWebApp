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
$notif= new notifAPI();
$assign= new assignAPI();

switch($action){
	//userAPI
	case "userLogin":
		echo json_encode($userAPI->checkAuth($_POST['username'],$_POST['pswd']));
		break;
	case "checkLogin":
		if(isset($_SESSION['uID'])){
			echo json_encode(array(1,$_SESSION['uID'],$_SESSION['uName'])) ;
		}else{
			echo json_encode(array(0)) ;
		}
		break;
	// case "regUser": 
	// 	echo json_encode($userAPI->regUser($_POST['name'],$_POST['role']=0,$_POST['uAlias'],$_POST['pswd'],$_POST['email']));
	// 	break;
	case "newPost":
		echo json_encode($post->newPost($_POST['title'],$_POST['content'],$_POST['type'],1,$_POST['notice'],$_POST['priority'],$_POST['image'],$_POST['notify'],$_POST['audience']));
		break;
	case "viewPost"://need seperate
		//some rendering reequired
		echo json_encode($post->getPosts($_POST['scope'],$_POST['from'],$_POST['to'],10));
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
	case "getPermissions"://need seperate
		//some rendering reequired
		echo json_encode($userAPI->perms());//$_SESSION['uYear']
		break;
	case "sendNotif"://need seperate
		//some rendering reequired
		echo json_encode($notif->send($_POST['content'],$_POST['audience'],$_POST['url'],$_SESSION['uID']));//$_SESSION['uYear']
		break;
	case "getNotif"://need seperate
		//some rendering reequired
		echo json_encode($notif->get());//$_SESSION['uYear']
		break;
	case "listAssign"://need seperate
		//some rendering reequired
		echo json_encode($assign->listAssign());//$_SESSION['uYear']
		break;
	case "classTmw"://need seperate
		//some rendering reequired
		echo json_encode($userAPI->classTmw());//$_SESSION['uYear']
		break;
	case "rate"://need seperate
		//some rendering reequired
		echo json_encode($subs->rate($_POST['cid'],$_POST['rate']));//$_SESSION['uYear']
		break;
	case "logout":
		$_SESSION['uID']=null;
		$_SESSION['uRole']=null;
		header("Location: ".$webRoot);
		break;

}
 
// echo "plain text";
?>