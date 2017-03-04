<?php
// ini_set( "display_errors", 0); 
/**
* New request lands in this class. After that it is routed accordingly to the respective controller.
* 
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
// $url = rtrim($url,'/');
// $url = rtrim($url,"/");
preg_match('@(.*)index.php(.*)$@', $_SERVER['PHP_SELF'], $mat );
$base = '@^'. $mat[1] ;

if (preg_match($base . '$@', $url, $match)) {
	if(isset($_SESSION['uID'])){
		require ('render/home.php');
	} else{
		require ('render/login.html');
	}
} elseif (preg_match($base . 'login?$@', $url, $match)) {
	require ('render/login.php');
} elseif (preg_match($base . 'register?$@', $url, $match)) {
	require ('render/register.php');
} elseif (preg_match($base . 'post/new?$@', $url, $match)) {
	require ('render/newPost.php');
} elseif (preg_match($base . 'logout?$@', $url, $match)) {
	require ('render/logout.php');
} else {
	http_response_code(404);
	require ('render/404.php');
	// die('invalid url ' . $url);
	die();
}


?>
