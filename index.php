<?php
// ini_set( "display_errors", 0); 
/**
* New request lands in this class.
* After that it is routed accordingly to the respective controller. 
*/
require_once('servConf.php');
// echo "id=".$_SESSION['uID'];
class Routing
{

	function __construct()
	{
		return null;
	}

	public function Redirect($url)
	{
		return null;
	}

}
// echo "check";
$url = $_SERVER['REQUEST_URI'];
preg_match('@(.*)index.php(.*)$@', $_SERVER['PHP_SELF'], $mat );
$base = '@^'. $mat[1] ;
	if(!isset($_SESSION['f403'])){
		$_SESSION['uID']=null;
	}

if(preg_match($base . 'cAPI/checkLogin?$@', $url, $match)){
	if(isset($_SESSION['uID'])){
			echo json_encode(array(1,$_SESSION['uID'],$_SESSION['uName'])) ;
		}else{
			echo json_encode(array(0)) ;
		}
}elseif (preg_match($base . '$@', $url, $match)) {
	if(isset($_SESSION['uID'])){
		require ('render/home.php');
	} else{
		require ('render/login.html');
	}
}
 elseif (preg_match($base . 'cAPI/(.*)$@', $url, $match)) {
	require ('render/commonAPI.php');
} elseif (preg_match($base . 'login?$@', $url, $match)) {
	require ('render/login.php');
} elseif (preg_match($base . 'register?$@', $url, $match)) {
	require ('render/register.php');//depreciates
} elseif( !isset($_SESSION['uID']) ) {
	header("Location: ".$webRoot);
} elseif (preg_match($base . 'timetable?$@', $url, $match)) {
	require ('render/timetable.php');
}elseif (preg_match($base . 'homeAgain?$@', $url, $match)) {
	require ('render/homeAgain.php');
} elseif (preg_match($base . 'home?$@', $url, $match)) {
	require ('render/home2.php');
} elseif (preg_match($base . 'admin?$@', $url, $match)) {
	require ('render/admin.php');
} elseif (preg_match($base . 'getting-around?$@', $url, $match)) {
	require ('render/maps.php');
} elseif (preg_match($base . 'courses?$@', $url, $match)) {
	require ('render/courses.php');
} elseif (preg_match($base . 'events?$@', $url, $match)) {
	require ('render/events.php');
} elseif (preg_match($base . 'clubs?$@', $url, $match)) {
	require ('render/clubs.php');
} elseif (preg_match($base . 'gall?$@', $url, $match)) {
	require ('render/gallery.php');
} elseif (preg_match($base . 'lost-found?$@', $url, $match)) {
	require ('render/lost_found.php');
} elseif (preg_match($base . 'upl/(.*)$@', $url, $match)) {
	require ('render/fUpload.php');
} elseif (preg_match($base . 'courses/view/(.*)$@', $url, $match)) {
	require ('render/viewCourse.php');
} elseif (preg_match($base . 'assignments?$@', $url, $match)) {
	require ('render/assignments.php');
} elseif (preg_match($base . 'mpr(.*)$@', $url, $match)) {
	require ('render/mpr-grp.php');
} elseif (preg_match($base . 'Njack(.*)$@', $url, $match)) {
	require ('render/Njack-GSOC.php');
} elseif (preg_match($base . 'Byte(.*)$@', $url, $match)) {
	require ('render/Byterace.php');
} elseif (preg_match($base . 'assignments/dl/(.*)$@', $url, $match)) {
	require ('render/assignmentDL.php');
} elseif (preg_match($base . 'post/new?$@', $url, $match)) {
	require ('render/newPost.php');//depreciated
} elseif (preg_match($base . 'post/JSON/(.*)/(.*)/(.*)$@', $url, $match)) {
	require ('render/viewPost.php');
} elseif (preg_match($base . 'logout?$@', $url, $match)) {
	require ('render/logout.php');//depreciated
} else {
	http_response_code(404);
	require ('render/404.php');
	// die('invalid url ' . $url);
	die();
}


?>
