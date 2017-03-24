<!DOCTYPE HTML>
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
                               	// $("#add-event-btn").hide();
                               	// window.location="";
                            	// location.reload(true);
                            	// window.location.reload();

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


				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.html">Home</a></li>
							<li><a href="landing.html">Landing</a></li>
							<li><a href="generic.html">Generic</a></li>
							<li><a href="elements.html">Elements</a></li>
						</ul>
						<ul class="actions vertical">
							<li><a href="#" class="button special fit">Get Started</a></li>
							<li><a href="#" class="button fit">Log In</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							
								<div class="inner">

                                     <section id=a_part style="display: none ;">
										<header class="major">
										<h1>Your Assignments</h1><hr style="width: 30%">
										<h3>This section is to upload assignments</h3>
										</header><hr style="width: 90%">




                                    <section>

										<form action="" method="POST" id="form2">
   									 <div class="row" style="margin:auto;  ;margin-top:5vh; ">

										<div class="col-sm-2" style="margin-left: 4vw;border-bottom: 2vw ;">
										<h2 style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;letter-spacing: 0.1225em ;">Assignment :  </h2>	
										<input type="text" name="fName" id="name" placeholder="Title">
										</div>
                                                 
											
										<div id="scopeSelect" class="form-el col-sm-2" style="margin-left: 4vw; ">
						  				<h2  style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;letter-spacing: 0.0900em ;" >Scope  Select:  </h2>
										<div class="select-wrapper" id="selectScope" style="width: 89% ;">
										<select name="demo-category" id="scope" placeholder="Scope" style="color:#000000 !important">
										<option value="">- Whom to notify -    </option>
								</select>
							</div>	
						</div>


										<div class=" col-sm-3" style="margin-left:3.5vw;">
										<h2 for="name" style="font-size: 3.5vh;font-family: 'Roboto', sans-serif;font-weight: 500;letter-spacing: 0.1225em;">Upload Date : &nbsp</h2>
										<input type="text" name="fContact" id="name" placeholder="dd/mm/yyyy">
										</div>



									</div>


									<hr width="100% ;"></form>
									</section>
				

									 <section>

										<form action="" method="POST" id="form1">
   									 <div class="row" style="margin:auto;  ;margin-top:5vh; ">
									

										<div class=" col-sm-3" style="margin-left:4vw;">
										<h2 for="name" style="font-size: 3.5vh;font-family: 'Roboto', sans-serif;font-weight: 500;letter-spacing: 0.1225em;">Deadline : &nbsp</h2>
										<input type="text" name="fContact" id="name" placeholder="dd/mm/yyyy">
										</div>

										<div class="col-sm-5" style="margin-left: 3.7vw;">
										<h2 for="name" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500; letter-spacing: 0.1000em ;">Upload :</h2>
									
											<div class="md-modal md-effect-1" id="modal-3">
											<div class="md-content">
		
	
									<div id="new-post-form">
									<span  class="adminRadio">
									<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
					

				
				
									<div id="selectImage " >
				
									<input type="file" class="form-el" style=" cursor: pointer;   padding: 10px;background-color: #22263c;color: #FFFFFF;border-radius: 10px;" name="file" id="file" required />
									</div>
					
									</form>
				
					
					<!-- <button class="" id="submitpost" onclick="submitForm();" class="form-el" style="color: #fff !important;">Upload!</button> -->
				
				</div>
				</div>
				</div>
	
										</div>
										<div class=col-sm-2 style="margin-top: 8.5vh ;margin-left:4vw ;border-radius: 5% ;">
										
										<button type="submit" form="form1"   value="Submit" style="color: #000000 ;height: 6vh ;background-color: #ffffff ;">Submit</button>
										</div>
										</div>
										<hr width="100% ;"></form>
										</section>
								
</section>
<!-- This is end of prof part  -->
<!--  The section below this shows the   Student part <-->
<section id="one">
<section id="s_part">
									<header class="major">
										<h1>Your Assignments</h1><hr style="width: 30%">
										<h3>This section shows you your's Assignments</h3>
									</header><hr style="width: 90%">


													<div class="table-wrapper">
														<table class="alt">
															<thead>
																<tr>
																	<th>Course</th>
																	<th>Assignments</th>
																	<th>Deadline</th>
																	<th>Download</th>
																	<th style="text-align: center;">  Submit</th>
																
																	
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>CS102</td>
																<td></td>
																<td></td>
																	<td style="width: 11% ; text-align: center ;"> <a href =## ><i class="fa fa-download" aria-hidden="true" style="text-align: center ;">  </i>  </a>   </td>
																  <td style="width:13% ; text-align: center;background-color: #000000 ; "> 		
															        <a href="#" >Submit</a>   </td>	
													
																	
																</tr>
																<tr>
																	<td>CS112</td>
															        <td></td>
															        <td></td>
																	<td style="width: 11% ; text-align: center ;"> <a href =## ><i class="fa fa-download" aria-hidden="true" style="text-align: center ;">  </i>  </a>   </td>
																  <td style="width:13% ; text-align: center;background-color: #000000 ; "> 		
															        <a href="#" >Submit</a>   </td>	
																	
																</tr>

																<tr>
																	<td>CS132</td>
															 		<td></td>
															 		<td></td>
															 			<td style="width: 11% ; text-align: center ;"> <a href =## ><i class="fa fa-download" aria-hidden="true" style="text-align: center ;">  </i>  </a>   </td>
																  <td style="width:13% ; text-align: center;background-color: #000000 ; "> 		
															        <a href="#" >Submit</a>   </td>	
																	
																</tr>
																<tr>
																	<td>CS122</td>
																	<td></td>
																	<td></td>
																	<td style="width: 11% ; text-align: center ;"> <a href =## ><i class="fa fa-download" aria-hidden="true" style="text-align: center ;">  </i>  </a>   </td>
																  <td style="width:13% ; text-align: center;background-color: #000000 ; "> 		
															        <a href="#" >Submit</a>   </td>	
																	
																</tr>
																<tr>
																	<td>CS112</td>
																	<td></td>
																	<td></td>
																	<td style="width: 11% ; text-align: center ;"> <a href =## ><i class="fa fa-download" aria-hidden="true" style="text-align: center ;">  </i>  </a>   </td>
																  <td style="width:13% ; text-align: center;background-color: #000000 ; "> 		
															        <a href="#" >Submit</a>   </td>	
																</tr>
															</tbody>
														
														</table>
													</div>

											</div>
										
										</div>

								</div>
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
	</body>
</html>