<?php
require_once('api/api.php');
require_once('servConf.php');
/**
 * newPost
 */
// echo $_SESSION['uID'];
$post= new postAPI();
 $post->newPost($_POST['title'],$_POST['content'],$_POST['type'],1,$_POST['notice'],$_POST['priority'],$_POST['image'],$_POST['notify'],$_POST['audience']);
 
?>