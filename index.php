<?php
// ini_set( "display_errors", 0); 
/**
* New request lands in this class. After that it is routed accordingly to the respective controller.
* 
*/
//to do
//////////////subscribe method
//send and write notif hook
//userrating
//map api
//events as posts

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
// $url = rtrim($url,'/');
// $url = rtrim($url,"/");
preg_match('@(.*)index.php(.*)$@', $_SERVER['PHP_SELF'], $mat );
$base = '@^'. $mat[1] ;
	if(!isset($_SESSION['f403'])){
		$_SESSION['uID']=null;
	}


if (preg_match($base . '$@', $url, $match)) {
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
} /*elseif (preg_match($base . 'register?$@', $url, $match)) {
	require ('render/register.php');//depreciates
} */elseif( !isset($_SESSION['uID']) ) {
	header("Location: ".$webRoot);
} elseif (preg_match($base . 'timetable?$@', $url, $match)) {
	require ('render/timetable.php');
} elseif (preg_match($base . 'admin?$@', $url, $match)) {
	require ('render/admin.php');
} elseif (preg_match($base . 'getting-around?$@', $url, $match)) {
	require ('render/maps.php');
} elseif (preg_match($base . 'courses?$@', $url, $match)) {
	require ('render/courses.php');
} elseif (preg_match($base . 'clubs?$@', $url, $match)) {
	require ('render/clubs.php');

} elseif (preg_match($base . 'lost_found?$@', $url, $match)) {
	require ('render/lost_found.php');
} elseif (preg_match($base . 'courses/view/(.*)$@', $url, $match)) {
	require ('render/viewCourse.php');
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
