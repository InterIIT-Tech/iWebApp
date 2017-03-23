<?php
require_once('servConf.php');

if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "gallery/".microtime(true).'_'.$_SESSION['uID']."_".sha1($_SESSION['uName'].$_FILES['file']['name']).'.'.$file_extension; // Target path where file is to be stored
 // Moving Uploaded file
if($match[1]=="gallery"){
	$sql = "INSERT INTO `gallery`(`title`,`user`,`path`) VALUES ('".$_POST['title_name']."', '".$_SESSION['uID']."', '".$targetPath ."')";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	echo "1";
        	move_uploaded_file($sourcePath,$targetPath) ;
        	// mkdir('gallery/'.$alias);
        	// mkdir("gallery/$alias", 0777);
        } else { echo"error!".mysqli_error($link);}
        mysqli_close($link);	
} else if($match[1]=="post"){
	move_uploaded_file($sourcePath,$targetPath) ;
	echo $targetPath;
}

// echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
// echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
// echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
// echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";

}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}
?>