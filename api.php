<?php
/**
 *User API
 */
class userAPI {
	public $webRoot;

	function __construct($IwebRoot) {
		if(!isset($IwebRoot)) exit;
		$this->webRoot=$IwebRoot;
	}

	public function checkAuth($user,$pass){
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