<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Getting around campus</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/timetable/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="assets/js/modernizr.custom.25376.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#showMenu').click(function(){
					$('.outer-nav').fadeOut(0).fadeIn(400);
				});
				$(".container").click(function(){
					$('.outer-nav').fadeOut(100);
				});
			});
		</script>
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

				<!-- Header -->
					<header id="header">
						https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=40.6655101,-73.89188969999998&destinations=40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626&key=AIzaSyCDoS4zxUVccoOIkEZadbmTssHyiV__QXw
							<a href="#back" id="showMenu" style="margin-left:30px ;">Menu :: iWebApp</a>
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
							<section id="one">
								<div class="inner">

									<header class="major">
										<h1>Maps</h1>
									</header>

									

									<h3>Take me:</h3>
                                                                 <div class="select-wrapper" >
																	<select name="demo-category" id="demo-category">
																		<option value="" style="background-color: #2a2f4a ;">- From -</option>
																		<option value="1" style="background-color: #2a2f4a ;"> Boys Hostel</option>
																		<option value="1" style="background-color: #2a2f4a ;"> Girls hostel</option>
																		<option value="1" style="background-color: #2a2f4a ;" >Admin Block</option>
																		<option value="1" style="background-color: #2a2f4a ;">Mech Workshop</option>
																		<option value="1" style="background-color: #2a2f4a ;">Tut Block</option>
																	</select>
																</div>
                                                                  

                                                                 <div class="select-wrapper-2 half ">
																	<select name="demo-category" id="demo-category">
																		<option value="" style="background-color: #2a2f4a ;">- To -</option>
																		<option value="1" style="background-color: #2a2f4a ;"> Boys Hostel</option>
																		<option value="1" style="background-color: #2a2f4a ;"> Girls hostel</option>
																		<option value="1" style="background-color: #2a2f4a ;" >Admin Block</option>
																		<option value="1" style="background-color: #2a2f4a ;">Mech Workshop</option>
																		<option value="1" style="background-color: #2a2f4a ;">Tut Block</option>
																	</select>
																</div>
											

											</div>
										
										</div>

								</div>
							</section><br>
							<center><iframe

						  height="450"
						  frameborder="0" style="border:0;width:80%"
						  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCDoS4zxUVccoOIkEZadbmTssHyiV__QXw
						    &q=IIT+Patna+Bihta" allowfullscreen>
						</iframe></center>
					</div>

		
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