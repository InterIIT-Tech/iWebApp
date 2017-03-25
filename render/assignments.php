<?php
require_once('servConf.php');
require_once('api/api.php');
$notif=new notifAPI;
$subs=new subsAPI;
$msg=null;
$status="";
if(isset($_POST['fName']) && isset($_FILES["file"]["type"]) && isset($_POST['course']) && isset($_POST['lastdate'])){
	$validextensions = array("pdf", "doc", "docx");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	$dir= str_replace(".", "", strval(microtime(true)));
	if (($_FILES["file"]["size"] < 10000000) && in_array($file_extension, $validextensions)) {

		if ($_FILES["file"]["error"] > 0){
			$msg = "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		} else {
			$sourcePath = $_FILES['file']['tmp_name'];

			$targetPath = "files/".$dir.'_'.preg_replace("/[^a-zA-Z]+/", "", $_SESSION['uName'])."_".sha1($_SESSION['uID'].$_FILES['file']['name']).'.'.$file_extension; // Target path where file is to be stored	
		}
	}
	if(!isset($targetPath)){
		$msg="Details Incomplete.";
	}else{
	$sql = "INSERT INTO `assign`(`aName`,`aScope`,`dir`,`lastdate`,`filename`) VALUES ('".$_POST['fName']."', '".$_POST['course']."', '". $dir ."', '". $_POST['lastdate'] ."','".$targetPath."')";
		$link =mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
		$result = mysqli_query($link,$sql);
        if($result){
        	$status= "1";
        	move_uploaded_file($sourcePath,$targetPath) ;
        	//notification API trigger;
        	$cname_=$subs->whatCourse($_POST['course']);
        	$notify_msg="New Assignment Uploaded \'".$_POST['fName']."\' in course ".$cname_[1]['cCode'];
        	$url = "assignments/dl/".$dir ;
        	// mkdir('gallery/'.$alias);
        	// mkdir("gallery/$alias", 0777);
        } else { $msg="error!".mysqli_error($link);}
        mysqli_close($link);
    }
}else{
	$msg="Details Incomplete.";
}
// echo $_POST['fName'];
// echo $_FILES["file"]["type"];
// echo $_FILES["file"]["name"];
// echo $_POST['lastdate'];
// echo $_POST['course'];
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Assignments::iWebApp</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<link rel="icon" type="image/png" href="http://iwebapp.ml/favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/timetable/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="assets/js/modernizr.custom.25376.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script src="assets/js/fortyNav.js"></script>
		<script >
			

			$.post("cAPI/getPermissions",
                        {},
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){//$("#myloader").fadeOut();
                               console.log(data);
                               if(data[0]==1){
                               	//if admin 
                               	var ourData=data[2];
                               	for(var i=0;i<data[1];i++){
                               		var type=(ourData[i]['type']==1)?"Course: ":"Club: ";
	                               	$("#scope").append("<option value='"+ourData[i]['cID']+"'>"+type+ourData[i]['cName']+"</option>");
                               	}
                               	$("#a_part").show();
								$("#s_part").hide();	
								

                               }else if(data[0]==0){
                               	// If non-admin
                               	$("#a_part").hide();
                               	$("#s_part").show();
                               	// $("#add-event-btn").hide();
                               }
                            }else{
                            	console.log("ajax request error");
                            	// If non-admin
                            	$(".adminRadio").hide();

                            }
                    }
		        ,"json");

		</script>
		<script src="assets/js/fortyNav.js"></script>
		<style>
				.wrapper.fullscreen {
					min-height: 40vh !important;
				}
				.outer-nav.right {
					left:10%;
				}
				.container {
					background: #242943;
				}
		</style>
	</head>
	<body>
	<div id="perspective" class="perspective effect-airbnb">
			<div class="container">
				<div class="wrapper">
		<!-- Wrapper -->
			<div id="wrapper">
<!-- This is the professor part of section -->
				<!-- Header -->
					<header id="header">
						<nav>
							<a href="#back" id="showMenu" style="margin-right:92vw ; ">Menu::iWebapp</a>
						</nav>
					</header>
				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							
								<div class="inner">

                                     <section id=a_part style="display: none ;">
										<header class="major">
										<h1>Your Assignments</h1><hr style="width: 30%">
										<h3>This section is to upload assignments</h3>
										</header><hr style="width: 90%">
									
												<h3><?php echo (isset($msg))?$msg:""; ?></h3>



                                    <section>

										<form action="" method="POST" id="form2" enctype="multipart/form-data">
   									 <div class="row" style="margin:auto;  ;margin-top:5vh; ">

										<div class="col-sm-2" style="margin-left: 4vw;border-bottom: 2vw ;">
										<h2 style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;letter-spacing: 0.1225em ;">Assignment :  </h2>	
										<input type="text" name="fName" id="name" placeholder="Title" required>
										</div>
                                                 
											
										<div id="scopeSelect" class="form-el col-sm-2" style="margin-left: 4vw; ">
						  				<h2  style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;letter-spacing: 0.0900em ;" >Scope  Select:  </h2>
										<div class="select-wrapper" id="selectScope" required style="width: 89% ;">
										<select name="course" id="scope" placeholder="Scope" style="background-color:#22263c !important">
										<option value="">- Assignment for ? -</option>
								</select>
							</div>	
						</div>
									</div>

   									 <div class="row" style="margin:auto;  ;margin-top:5vh; ">
									

										<div class=" col-sm-3" style="margin-left:4vw;">
										<h2 for="name" style="font-size: 3.5vh;font-family: 'Roboto', sans-serif;font-weight: 500;letter-spacing: 0.1225em;">Deadline : &nbsp</h2>
										<input type="text" name="lastdate" id="name" placeholder="yyyy-mm-dd">
										</div>

									<h4>Upload File:</h4><br>
									<input type="file" class="form-el" style="    padding: 10px;color: #FFFFFF;border-radius: 10px;" name="file" id="file" required />
									
									<button type="submit" form="form2"   value="Submit" style="color: #000000 ;height: 6vh ;background-color: #ffffff ;">Submit</button>
										</div>
					
										<hr width="100% ;"></form>
									
					<!-- <button class="" id="submitpost" onclick="submitForm();" class="form-el" style="color: #fff !important;">Upload!</button> -->
				
									</div>
									</div>
									</div>
	
										</div>
										
										
										</section>
	
<!-- This is end of prof part  -->
<!--  The section below this shows the   Student part <-->
<section id="one" style="margin-left:10%;margin-right:10%;">
<section id="s_part">
									<header class="major">
										<h1>Your Assignments</h1><hr style="width: 30%">
										<h3>This section shows you your's Assignments</h3>
									</header><hr style="width: 90%">

									<h3>Assignments with upcoming deadlines:</h3>
													<div class="table-wrapper">
														<table class="alt">
															<thead>
																<tr>
																	<th>Course</th>
																	<th>Name</th>
																	<th>Deadline</th>
																	<th>Download</th>
																	<th style="text-align: center;">  Submit</th>
																
																	
																</tr>
															</thead>
															<tbody>
																<?php
																	$assign=new assignAPI;
																	$print="";
																	$sql="SELECT `aID`,`aName`,`aScope`,`dir`,`lastdate`,`filename` FROM `assign` WHERE lastdate > DATE(NOW())";
																	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
															        	if($result && mysqli_num_rows($result)>0){
															            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
															        		$cname_=$subs->whatCourse($row['aScope']);
															            		$color=($assign->checkstat($row['aID'])==1)?"style='background-color: rgba(0, 228, 0, 0.12);'":"style='background-color:rgba(218, 56, 56, 0.46);'";
															            		$print.="<tr $color >";	
															            		$print.="<td>".$cname_[1]['cCode']."</td>";
															            		$print.="<td>".$row['aName']."</td>";
															            		$print.="<td>".$row['lastdate']."</td>";
															            		$print.='<td style="width: 11% ; text-align: center ;"> <a href ='.$row['filename'].' target="_blank" ><i class="fa fa-download" aria-hidden="true" style="text-align: center ;">  </i>  </a>   </td>';
															        			$print.='
																  <td style="width:13% ; text-align: center;background-color: #000000 ; ">
															        <a onclick ="subm('.$row['dir'].')" >Submit</a>   </td>	';
															            	}
															            	echo $print;
															            
																		}else{
																			
																		}
																?>
																
																
																
															</tbody>
														
														</table>
													</div>

									<h3>Assignments with past deadlines:</h3>
													<div class="table-wrapper">
														<table class="alt">
															<thead>
																<tr>
																	<th>Course</th>
																	<th>Name</th>
																	<th>Deadline</th>
																	<th>Download</th>
																	<th style="text-align: center;">  Submit</th>
																
																	
																</tr>
															</thead>
															<tbody>
																<?php
																	$print="";
																	$sql="SELECT `aID`,`aName`,`aScope`,`dir`,`lastdate`,`filename` FROM `assign` WHERE lastdate < DATE(NOW())";
																	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
															        	if($result && mysqli_num_rows($result)>0){
															            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
															        		$cname_=$subs->whatCourse($row['aScope']);
															            		
															            		$color=($assign->checkstat($row['aID'])==1)?"style='background-color: rgba(0, 228, 0, 0.12);'":"style='background-color: rgba(218, 56, 56, 0.46);'";
															            		$print.="<tr $color >";	
															            		$print.="<td>".$cname_[1]['cCode']."</td>";
															            		$print.="<td>".$row['aName']."</td>";
															            		$print.="<td>".$row['lastdate']."</td>";
															            		$print.='<td style="width: 11% ; text-align: center ;"> <a href ='.$row['filename'].' target="_blank" ><i class="fa fa-download" aria-hidden="true" style="text-align: center ;">  </i></a></td>';
															        			$print.='
																   <td style="width:13% ; text-align: center;background-color: #000000 ; ">
															        <a onclick ="subm('.$row['dir'].')" >Submit</a>   </td>		';
															            	}
															            	echo $print;
															            
																		}else{
																			
																		}
																?>
																
																
																
															</tbody>
														
														</table>
													</div>


											</div>
										
										</div>

								</div>
							</section>
					</section>
					</div>

<!-- This is end of student part  -->		
			</div>

		<!-- Scripts -->
			<script src="assets/timetable/js/jquery.min.js"></script>
			<script src="assets/timetable/js/jquery.scrolly.min.js"></script>
			<script src="assets/timetable/js/jquery.scrollex.min.js"></script>
			<script src="assets/timetable/js/skel.min.js"></script>
			<script src="assets/timetable/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/timetable/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/timetable/js/main.js"></script>
			<script src="assets/js/classie.js"></script>
			<script src="assets/js/menu.js"></script>
		</div></div>
		<?php require('render/menu.php');?>
		</div>
		<!--  -->
	</body>
</html>