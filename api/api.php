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

	function __construct($IwebRoot = null) {
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

	public function whoIs($display,$query,$queryParam){
		$ret = array();
		//advanced queries, use different display var.
		$sql = "SELECT `uAlias` FROM `users`  WHERE `uID`= 1";
			// global $conn;
		// echo $sql;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result && mysqli_num_rows($result)>0){
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		return $row[$display];
            	}
            print_r($result);
			}else{
				return(-1);
			}
			return $ret;
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
		$uName=null;
		if(isset($username) && isset($pass)){
			$sql = "SELECT `SHA_pswd`,`uID`,`year`,`uName` FROM `users`  WHERE `uAlias`= '".$username."'";
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
            			$uName=$row['uName'];
            			$resp[]=$row['uID'];

            			break;
            		} else {
            		 $resp[] = -1;
            		 $resp[] ='Invalid Credentials';
            		}
            	}
			}
		}
		if($uID) {$_SESSION['uID']=$uID;$_SESSION['uRole']=$uRole;$_SESSION['uYear']=$uYear;$_SESSION['uName']=$uName;$_SESSION['f403']=sha1($pass);}
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

	public function perms(){
		$ret=array();
		$perms=array();
		$sql = "SELECT `type`,`cID`,`cName` FROM `admins`  WHERE `uID`= '".$_SESSION['uID']."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result && mysqli_num_rows($result)>0){
        		$ret[]=1;
        		$ret[]=mysqli_num_rows($result);
        		$i=0;
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$perms[$i]['type']=$row['type'];
            		$perms[$i]['cID']=$row['cID'];
            		$perms[$i++]['cName']=$row['cName'];
            	}
            
            $ret[]=$perms;
			}else{
				$ret[]=0;
				$ret[] = "None";
			}
			return $ret;
	}

public function decodeTime($hrs){
	$mins=$hrs%100;
	$mins_ = sprintf("%02d", $mins);
	$hrs=(int)$hrs/100;
	if($hrs>12){ $hrs-=12; return "$hrs:$mins_ pm"; }
	else if($hrs<12){ return "$hrs:$mins_ am"; }
}
	public function classTmw(){

		$datetime = new DateTime('tomorrow');
		$dayName = $datetime->format('l');
		$dayName=substr(strtolower($dayName), 0,3);
		$dayName.=($dayName=="thu")?"r":"";
		$day=$dayName;
		$data=array();
		$data2=array();
		$sql = "SELECT `coID` FROM `sublist`  WHERE `uID`= '".$_SESSION['uID']."'";
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					$sql_ = "SELECT `cCode`,`".$day."`,`".$day."_` FROM `ttable`  WHERE `cID`= '".$row['coID']."'";
					echo $sql_;
		        	$result_ = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql_);
		        	if($result_){
		        		echo json_encode($result_);
						while ($row_ = mysqli_fetch_array($result_, MYSQL_ASSOC)) {
							$data2[]=$row_['cCode']." from ".$this->decodeTime($row_[$day])." to ".$this->decodeTime($row_[$day.'_']);
					}
				}
			}

			$data[]=1;
			$data[]=mysqli_num_rows($result);//bug
			$data[]=$data2;
	}else{
		$data[]=-1;
	}
	return $data;
}
}

 
/**
 * posts API
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
	public function getPosts($scope,$from,$to,$limit){
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
        		$res[]=1;
        		$res[]=mysqli_num_rows($result);
        		$postArray=array();
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$postArray[$i]['title']=$row['postTitle'];
            		$postArray[$i]['content']=$row['postContent'];
            		$postArray[$i++]['image']=$row['image'];
            	}
            	$res[]=$postArray;
            } else {
            	$res[] = -1;
            }
        return $res;
	}
}

class subsAPI{
	
	public function subscribe($type,$id){
		//mysql
		$t=($type>1)?"clID":"coID";
		$sql = "INSERT INTO `sublist`(uID,$t) VALUES ('".$_SESSION['uID']."','$id')";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	$ret[]=1;
        	$ret[]="Subscribed";
        	return $ret;
        	exit;
        } else { $ret[]=-1;$ret[]= mysqli_error($link);}
        mysqli_close($link);
        return $ret;
	}
	
	public function unSubscribe($type,$id){
		//mysql
		$t=($type>1)?"clID":"coID";
		$sql = "DELETE FROM `sublist` WHERE `$t`=$id ";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	$ret[]=1;
        	$ret[]="unSubscribed";
        	return $ret;
        	exit;
        } else { $ret[]=-1;$ret[]= mysqli_error($link);}
        mysqli_close($link);
        return $ret;
	}

	public function getSubs(){
		//mysql
		$out=array();
		$i=0;
		$sql = "SELECT `coID` FROM `sublist`  WHERE `uID`= '".$_SESSION['uID']."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					$out[]=$row['coID'];
            	}
            	return $out;
			}
	}

	public function checkSub($type){
		//mysql
		$out=array();
		$i=0;
		$t=($type>1)?"clID":"coID";//depreciated.
		$sql = "SELECT `$t` FROM `sublist`  WHERE `uID`= '".$_SESSION['uID']."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					$temp=$row[$t];
					$out[$temp]=1;
            	}
            	return $out;
			}
	}

	//notification table update //moved to notifAPI
	public function updateSubs($audience,$title,$content){
		//@todo
	}
	// public function viewClubs(){

	// 	//@todo
	// }
	public function viewCourses($year){
		//@todo
		$cse=array();
		$c=0;$e=0;$m=0;$ce=0;
		$elec=array();
		$mech=array();
		$civil=array();
		$result=array();
		$sql = "SELECT `cCode`,`cID`,`branch`,`rating`,`cName`,`img` FROM `courses`  WHERE `year`= '".$year."' ORDER BY `cCode`";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		if($row['branch']==1){
            			$c++;
            			$cse[]=array($row['cID'],$row['cCode'],$row['rating'],$row['cName'],$row['img']);
            		}
            		if($row['branch']==2){
            			$e++;
            			$elec[]=array($row['cID'],$row['cCode'],$row['rating'],$row['cName'],$row['img']);
            		}
            		if($row['branch']==3){
            			$m++;
            			$mech[]=array($row['cID'],$row['cCode'],$row['rating'],$row['cName'],$row['img']);
            		}
            		if($row['branch']==4){
            			$ce++;
            			$civil[]=array($row['cID'],$row['cCode'],$row['rating'],$row['cName'],$row['img']);
            		}
            	}
			}
			$result = array($cse,$elec,$mech,$civil);
			return $result;//cName
	}

	public function rate($cID,$rating){
		return $cID." ... ".$rating;
	}
}

/**
 * Notification API
 */
class notifAPI{

	public function send($content,$audience,$url,$sender){
		$sql = "INSERT INTO `notify`(nContent,nGroup,nSender,url) VALUES ('".$content."', '".$audience."', '".$sender."', '".$url."')";
		$link = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	$ret[]=1;
        	$ret[]="Successfully Notified";
        	return $ret;
        	exit;
        } else { $ret[]=-1;$ret[]= mysqli_error($link);}
        mysqli_close($link);
        return $ret;
	}

	public function get(){
		require_once('servConf.php');
		//array containing all subscribed courses and clubs
		$NoifyList=array();
		$userAPI=new userAPI(webRoot);
		$subAPI = new subsAPI;
		$subsList = $subAPI->getSubs();
		// print_r($subsList) ;
		$sql = "SELECT `nContent`,`nSender`,`url` FROM `notify`  WHERE ( `nGroup`= '1'";
		//loop
		foreach ($subsList as &$sub) {
		    $sql .= " OR `nGroup`='$sub'";
		}
		$sql .=	" ) ORDER BY `nID` DESC LIMIT 10";
		// echo $sql;
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	// echo mysqli_num_rows($result);
        	if($result && mysqli_num_rows($result)>0){
        		$ret[]=1;
        		$ret[]=mysqli_num_rows($result);
        		$i=0;
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
						$NoifyList[$i]['title'] = $row['nContent']; 
						$NoifyList[$i]['url'] = $row['url']; 
						$NoifyList[$i++]['author'] =$userAPI->whoIs('uName','uID',$row['nSender']); 
            		}
            
            $ret[]=$NoifyList;
			}else{
				$ret[]=-1;
				$ret[] = "None";
			}
			// return $ret[2][0]['author'];
			return $ret;
	}


}

/**
 *Class API handling all event related operations
 */
class eveAPI{

	public function getEvents(){

	}
	public function	newEvent(){

	}
}

/**
 *Class API handling all assignment related operations
 */

class assignAPI{
	
	public function listAssign(){
		$asList=array();
		$sql="select A.aID,A.aName from users U,assign A LEFT JOIN  submission S on S.aID=A.aID where U.uID=".$_SESSION['uID']." and S.aID is NULL";
		$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result && mysqli_num_rows($result)>0){
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$asList[]=$row;
            	}
            $ret[]=1;
            $ret[]=mysqli_num_rows($result);
            $ret[]=$asList;
			}else{
				$ret[]=-1;
				$ret[]=($result)?mysqli_error($link):"<1";
			}
			return $ret;
	}

	public function newAssign(){

	}

	public function subAssign(){
	
	}
}

class lostAPI{

	public function lost($cont,$name){
		$sql = "INSERT INTO `lnf` (`uID`, `type`, `contact`, `iName`, `iPlace`) VALUES ('".$_SESSION['uID']."', '1', '".$cont."', '".$name."' , NULL);";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	$ret[]=1;
        } else { $ret[]=-1;$ret[]= mysqli_error($link);}
        mysqli_close($link);
        return $ret;
        //display list of simmilar items?

	}

	public function search($iID){
		$querStr=array();
		$resArr=array();
		$ret=array();
		$resArr[]=-1;
		if($iID==-1 || !isset($iID)){
			$sql = "SELECT `iName` FROM `lnf`  WHERE `type`= '1' ORDER BY `iID` DESC LIMIT 1";

        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result && mysqli_num_rows($result)>0){
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$querStr=$row['iName'];            	}
            }
		}else{
			$sql = "SELECT `iName` FROM `lnf`  WHERE `iID`= '$iID'";

        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result && mysqli_num_rows($result)>0){
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$querStr=$row['iName'];            	}
            }


		}
		$sql = "SELECT `contact`,`iName`,`iPlace` FROM `lnf`  WHERE `type`= '2'";

        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result && mysqli_num_rows($result)>0){
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		similar_text($row['iName'],$querStr,$perc);
            		if($perc>50){
            			if($resArr[0]==-1)$resArr[0]=1;

            			$resArr[]=$row;
            		}
            	}
        }
        return $resArr;
	}



	public function found($cont,$name,$place){
		$sql = "INSERT INTO `lnf`(type,contact,iName,iPlace,uID) VALUES ('2', '".$cont."', '".$name."', '".$place."','".$_SESSION['uID']."')";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	$ret[]=1;
        	return $ret;
        	exit;
        } else { $ret[]=-1;$ret[]= mysqli_error($link);}
        mysqli_close($link);
        return $ret;
	}

	public function notify(){

	}

	public function getAll(){//works
		$ret = array();
		$sql = "SELECT `contact`,`iName`,`iPlace` FROM `lnf`  WHERE `type`= '2'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result && mysqli_num_rows($result)>0){
        		$ret[]=1;
        		$ret[]=mysqli_num_rows($result);
        		$i=0;
            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$perms[$i]['name']=$row['iName'];
            		$perms[$i]['contact']=$row['contact'];
            		$perms[$i++]['place']=$row['iPlace'];
            	}
            
            $ret[]=$perms;
			}else{
				$ret[]=-1;
				$ret[] =($result)? "0 rows":"Query error";
			}
			return $ret;
	}
}
//gallery let ppl upload photos in their usrname folders
?>