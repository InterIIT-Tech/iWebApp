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

	/**
	*
	*Filter string for SQL Injection attack possibility
	*@todo More Work needed
	*/ 
	 public function SQLInjFilter(&$unfilteredString){
		// $unfilteredString;
		$unfilteredString = mb_convert_encoding($unfilteredString, 'UTF-8', 'UTF-8');
		$unfilteredString = htmlentities($unfilteredString, ENT_QUOTES, 'UTF-8');

		
	}


	/**
	 * @var username and pass 
	 * Function only checks for correct password
	 * Function must be called from a different function where the actual 
	 * [Working]
	 */
	public function checkAuth($username,$pass){
		$resp =array();
		$uID=null;
		$uRole=null;
		if(isset($username) && isset($pass)){
			$sql = "SELECT `password`,`uID` FROM `people`  WHERE `usrname`= '".$username."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if(!$result || mysqli_num_rows($result)<1){
            	$resp[] = -1;
            	$resp[] = 'Unknown Username,Password combination.';
			} else { 
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		if ($row['password']==sha1($pass)){
            			$resp[]=1;
            			$uID=$row['uID'];
            			$resp[]=$row['uID'];
            			break;
            		} else {
            		 $resp[] = -1;
            		 $resp[] 'Unknown Username,Password combination.';
            		}
            	}
			}
		}
		if($uID) {$_SESSION['uID']=$uID;$_SESSION['uRole']=$uRole; $resp[]=1;}
		else { $resp[]=-1; }
		return $resp;
		
	}


	/**
	*Function regUser()
	*/
	public function regUser($usrname,$name,$pswd,$type){
		$this->SQLInjFilter($usrname);
		$this->SQLInjFilter($name);
		$this->SQLInjFilter($pswd);
		$this->SQLInjFilter($type);
		//validations
		//usrname must be same as webmailusername
		$sql = "INSERT INTO `people`(usrname,name,password,type) VALUES ('".$usrname."', '".$name."', '".$pswd."', '".$type."')";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	return 1;

        }else{ return mysqli_errno($link) . ": " . mysqli_error($link);}
        mysqli_close($link);
	}
	
	
	/*
	* checklogin to check logged in status of user
	* returns true if logged in else false
	*[working]
	*/
	public function checkLogin(){
		if(isset($_SESSION['id']) && isset($_SESSION['uid'])){
			$sql = "SELECT `uid`,`ip`,`ipalt` FROM `sessionActivity`  WHERE `idmd5`= '".$_SESSION['id']."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                	if ($_SESSION['uid']== $row['uid'] ){
                		//if($row['ip']==$_SERVER['REMOTE_ADDR'] || $row['ipalt']==$_SERVER['REMOTE_ADDR']){ 
                		$this->updateLastLogin($_SESSION['id']);
                		return true;
                		//}
                	} else { 
                		$_SESSION['uid']=null;
                		$_SESSION['id']=null;
                		return 0;
                	}
            	}
        	} else {
        		return 0;
                logmydata ("Error in Query Execution");
        	}
		} else {
			return 0;
		}
	}


}
?>