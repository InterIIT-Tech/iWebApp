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
		if($uID) {$_SESSION['uID']=$uID;}
		else { header("Location: ".$webRoot);exit; }
	}
}
?>