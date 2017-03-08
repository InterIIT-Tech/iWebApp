<?php

/**
 *		 ****	*****	******
 *		**	**	**	**	  **
 *		******	*****	  **
 *		**	**	**		  **
 *		**	**	**		******
 */


require_once('servConf.php');

if(session_status() == PHP_SESSION_NONE){session_start();}

date_default_timezone_set('Asia/Calcutta');


/**
 * log function as error log
 */
function logmydata($logstring){
	$file = '../log.txt';
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
		$this->SQLInjFilter($username);
		$this->SQLInjFilter($pass);
		$resp =array();
		$uID=null;
		$uRole=null;
		$uYear=null;
		if(isset($username) && isset($pass)){
			$sql = "SELECT `SHA_pswd`,`uID`,`year` FROM `users`  WHERE `uAlias`= '".$username."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if(!$result || mysqli_num_rows($result)<1){
            	$resp[] = -1;
            	$resp[] = 'Invalid Credentials';
            	// $resp[] = "Username trouble: $username";
			} else { 
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		if ($row['SHA_pswd']==sha1($pass)){
            			$resp[]=1;
            			$uID=$row['uID'];
            			$uYear=$row['year'];
            			$resp[]=$row['uID'];
            			break;
            		} else {
            		 $resp[] = -1;
            		 $resp[] ='Invalid Credentials';
            		}
            	}
			}
		}
		if($uID) {$_SESSION['uID']=$uID;$_SESSION['uRole']=$uRole;$_SESSION['uYear']=$uYear;}
		else { $resp[]=-1; }
		return $resp;
		
	}


	/**
	*Function regUser()
	*/
	public function regUser($name,$role,$alias,$pswd,$email){
		$this->SQLInjFilter($role);
		$this->SQLInjFilter($name);
		$this->SQLInjFilter($pswd);
		$this->SQLInjFilter($alias);
		$pswd=sha1($pswd);
		$ret= array();
		//validations
		//usrname must be same as webmailusername
		if($name ==null ||$name==''){
			$ret[]=-1;
			$ret[]="Missing Parameter: Name";
			return $ret;
			exit;
		}
		// if($role ==null ||$role==''){
		// 	$ret[]=-1;
		// 	$ret[]="Missing Parameter: role";
		// 	return $ret;
		// 	exit;
		// }
		if($alias ==null ||$alias==''){
			$ret[]=-1;
			$ret[]="Missing Parameter: username";
			return $ret;
			exit;
		}
		if($pswd ==null ||$pswd==''){
			$ret[]=-1;
			$ret[]="Missing Parameter: Password";
			return $ret;
			exit;
		}
		if($email ==null ||$email==''){
			$ret[]=-1;
			$ret[]="Missing Parameter: email";
			return $ret;
			exit;
		}
		$sql = "INSERT INTO `users`(uName,uRole,SHA_pswd,uAlias,email) VALUES ('".$name."', '".$role."', '".$pswd."', '".$alias."','".$email."')";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){

        	$ret[]=1;
        	$ret[]="Successfully Registered";
        	mkdir('gallery/'.$alias);
        	mkdir("gallery/$alias", 0777);
        	return $ret;
        	exit;
        } else { $ret[]=-1;$ret[]= mysqli_error($link);}
        mysqli_close($link);
        return $ret;
	
	}

	/*
	* checklogin to check logged in status of user
	* returns true if logged in else false
	* [working]
	*/
	public function checkLogin(){
		if(isset($_SESSION['uID']) && isset($_SESSION['uRole'])){
			return [1];
		} else {
			return [0];
		}
	}


}


/**
 * post API
 */

class postAPI{
	/**
	 * Filter string for SQL Injection attack possibility
	 * @todo More Work needed
	 */ 
	 public function SQLInjFilter(&$unfilteredString){
		// $unfilteredString;
		$unfilteredString = mb_convert_encoding($unfilteredString, 'UTF-8', 'UTF-8');
		$unfilteredString = htmlentities($unfilteredString, ENT_QUOTES, 'UTF-8');

		
	}

	/**
	*Function newPost()
	*/
	public function newPost($title,$content,$type,$featured,$notice,$priority,$image,$notify,$audience){
		$ret= array();
		$locDate=date('Y-m-d H:i:s');
		$sql = "INSERT INTO `posts`(postTitle,postContent,postType,featured,postAuthor,postDate,notice,priority,image,notify,audience) VALUES ('".$title."', '".$content."', '".$type."', '".$featured."','".$_SESSION['uID']."', '".$locDate."', '".$notice."', '".$priority."', '".$image."', '".$notify."','".$audience."')";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){

        	$ret[]=1;
        	$ret[]="Successfully Added post";
        	
        }else{ $ret[]=-1;$ret[]= mysqli_errno($link) . ": " . mysqli_error($link);}
        mysqli_close($link);
	return $ret;
	}

	/**
	 * get posts from database
	 */
	public function getPosts($scope,$from,$to,$limit = 5){
		$res = array();
		$multi = array();
		$multi = explode(",", $scope);
		$i = 0;
		$j = 0;
		if(!isset($multi[1])){

			$sql = "SELECT `postTitle`,`postContent`,`image` FROM `posts` WHERE ( `audience`= '$scope' and DATE(`postDate`)>'$from' and DATE(`postDate`)<'$to' ) ORDER BY `postDate` DESC LIMIT $limit";
		
		} else {//check if working
			
			$sql = "SELECT `postTitle`,`postContent`,`image` FROM `posts` WHERE (";
			
			while ($multi[$j]){
				$sql .= " `audience`= '".$multi[$j++]."'";
			}
			$sql .= ") and DATE(`postDate`)>'$from' and DATE(`postDate`)<'$to' ) ORDER BY `postDate` DESC LIMIT $limit";
		}
			//date format '2010-04-29'
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$res[$i]['title']=$row['postTitle'];
            		$res[$i]['content']=$row['postContent'];
            		$res[$i++]['image']=$row['image'];
            	}
            } else {
            	$res[] = -1;
            }
        return $res;
	}
}

class subsAPI{
	
	public function subscribe($type,$id){
		//mysql
	}

	public function checkSub($type,$id){
		//mysql
	}

	//notification table update
	public function updateSubs($audience,$title,$content){
		//@todo
	}
	// public function viewClubs(){

	// 	//@todo
	// }
	public function viewCourses($year=$_SESSION['uYear']){
		//@todo
		$cse=array();
		$elec=array();
		$mech=array();
		$civil=array();
		$result=array();
		$sql = "SELECT `cCode`,`cID`,`branch`,`rating` FROM `courses`  WHERE `year`= '".$year."' GROUP BY `branch` ORDER BY ";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		if($row['branch']==1){
            			$cse[]=array($row['cID'],$row['cCode'],$row['rating']);
            		}
            		if($row['branch']==2){
            			$elec[]=array($row['cID'],$row['cCode'],$row['rating']);
            		}
            		if($row['branch']==3){
            			$mech[]=array($row['cID'],$row['cCode'],$row['rating']);
            		}
            		if($row['branch']==4){
            			$civil[]=array($row['cID'],$row['cCode'],$row['rating']);
            		}
            	}
			}
			$result = array($cse,$elec,$mech,$civil);
			return $result;
	}
}
?>