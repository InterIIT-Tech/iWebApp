<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Events::iWebApp</title>
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
				th:nth-child(1) {
				    width: 20%;
				}
				th:nth-child(2) {
				    width: 80%;
				}
				td:nth-child(1) {
				    width: 20%;
				}
				td:nth-child(2) {
				    width: 80%;
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
						<nav>
							<a href="#back" id="showMenu" style="position: absolute;left: 10px;">Menu::iWebApp</a>
						</nav>
					</header>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">

									<header class="major">
										<h1>Events</h1><hr style="width: 30%">
										<h3>This section shows the upcoming events thoughout the year. <h3>
									</header><hr style="width: 60%">
													<div class="table-wrapper">
														<table class="alt">
															<thead>
																<tr>
																	<th>Date</th>
																	<th>Event</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1st Jan 2017</td>
																	<td style="background:#"></td>
																</tr>
															</tbody>

														</table>
													</div>

											</div>

										</div>

								</div>
							</section>

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
