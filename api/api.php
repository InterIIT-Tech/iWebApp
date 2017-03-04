<?php
require_once('servConf.php');

if(session_status() == PHP_SESSION_NONE){session_start();}

date_default_timezone_set('Asia/Calcutta');
/**
 * log function as error log
 */
function logmydata($logstring){
	$file = '../log_ppl.txt';
	$date=date('d_F_Y_h_i_s_A');
	$finalstring= "\n --------------\n [".$_SERVER['REMOTE_ADDR']."] \n [$date] \n  $logstring ";
	file_put_contents($file, $finalstring, FILE_APPEND | LOCK_EX);
}

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

	if (!$conn) {
    	logmydata ("Error: Unable to connect to MySQL." . PHP_EOL);
    	logmydata ("Debugging errno: " . mysqli_connect_errno() . PHP_EOL);
    	logmydata ("Debugging error: " . mysqli_connect_error() . PHP_EOL);
    	exit;
	}

/**
 *User API
 */

class userAPI {
	public $webRoot;

	function __construct($IwebRoot) {
		if(!isset($IwebRoot)) exit;
		$this->webRoot=$IwebRoot;
	}

	public function checkAuth($user,$pass,$uroll){
		$uID=null;
		//mysql
		//uroll=admin and user::2,1
		if($uID) {$_SESSION['uID']=$uID;$_SESSION['uRole']=$uRole;}
		else { header("Location: ".$webRoot);exit; }
	}
	public function regUser(){
		
	}
	
}
?>