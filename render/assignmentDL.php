<?php
require_once('api/api.php');
require_once('servConf.php');
$dir="";
$filename="";
$aname="";
$sql = "SELECT `aName`,`dir`,`filename` FROM `assign` WHERE (`dir`= ".$match[1].")";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            			$dir=$row['dir'];
            			$filename=$row['filename'];
            			$aname=$row['aName'];
            		}
            	
			}

$file = $filename;
$ext=explode(".", $file);
$aname.='.'.$ext[1];
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($aname).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}else{
	echo $filename;
	// include_once('render/404.php');
}
?>