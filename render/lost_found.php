
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Lost_found</title>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/lost_found/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/lost_found/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/lost_found/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/lost_found/css/ie8.css" /><![endif]-->
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
	<script>
		//alert('<?php echo $_POST['lName']; ?>');
	</script>
<!-- 	<script >
		// $(document).ready( function(){
		// 	$('#panel').click(function()
		// 	{ $('#flip').slideUp("slow") ;
				

		// 		});
		// 		$('#panel').click(function()
		// 	{ $('#flip').slide("slow") ;
				

		// 		});
		// });



	</script> -->
	</head>
	<body>
	<div id="perspective" class="perspective effect-airbnb">
			<div class="container">
				<div class="wrapper">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.html"  class="logo"></a>
						<nav>
								<a href="#back" id="showMenu" style="margin-right:98vw ; ">Menu::iWebapp</a>
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


							

									<header class="major" >
										<h1>Lost and Found</h1><hr style="width: 30% ;position: relative; top:-35px ;">
									
									</header>	
                                    <section >

										<form action="" method="POST" id="form1">
   									 <div class="row" style="margin:auto;  ;margin-top:5vh; ">
									
										<div class="col-sm-5" style="margin-left: 4.5vw;">
										<label for="name" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;">Lost  Something :</label>
										<input type="text" name="lName" id="name" placeholder="ObjectName">
										</div>

										<div class=" col-sm-5" style="margin-left: 4vw ;">
										<label for="name" style="font-size: 3.5vh;font-family: 'Roboto', sans-serif;font-weight: 500;">Your contact: &nbsp</label>
										<input type="text" name="lContact" id="name" placeholder="Number">
										</div>

										<div class=col-sm-2 style="margin-top: 7.9vh ;margin-left:5vw ;border-radius: 5% ;">
										
										<button type="submit" form="form1"  class="button special" value="Submit">Submit!</button>
										</div>
									
									</div>


									<hr width="100% ;"></form>
									</section>

                                    <section>

										<form action="" method="POST" id="form2">
   									 <div class="row" style="margin:auto;  ;margin-top:5vh; ">

										<div class="col-sm-2" style="margin-left: 4.5vw;border-bottom: 2vw ;">
										<label for="name" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;">Found Something :</label>
										<input type="text" name="fName" id="name" placeholder="ObjectName">
										</div>
                                                 
											<div class="col-sm-2" style="margin-left: 6vw;">
										<label for="name" style="font-size: 3.3vh;  font-family: 'Roboto', sans-serif;font-weight: 500;">Place:</label>
										<input type="text" name="fPlace" id="name" placeholder="Where??">
										</div>



										<div class=" col-sm-3" style="margin-left:5vw;">
										<label for="name" style="font-size: 3.5vh;font-family: 'Roboto', sans-serif;font-weight: 500;">Your contact: &nbsp</label>
										<input type="text" name="fContact" id="name" placeholder="Number">
										</div>

										<div class=col-sm-5	 style="margin-top: 9vh ;margin-left:3.8vw; ;border-radius: 5% ;">
										<button type="submit" form="form2"  class="button special" value="Submit">Submit!</button>
										
										</div>

									</div>


									<hr width="100% ;"></form>
									</section>
													<div class="table-wrapper">
														<table class="alt">
															<thead>
																<tr>
																	<th>Sr.no</th>
																	<th>Item</th>
																	<th>Contact</th>
																	
																
																	
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1</td>
																	<td>Not intrested</td>
																	<td>911</td>
																	<td>Get Lost</td>
												
																</tr>
																
															</tbody>
														
														</table>
													</div>

											</div>
										
										</div>

								</div>
						

					</div>
											

				
					</div>

				

			
			</div>

			                   
</div>
</div>     					
		<!-- Scripts -->
			<script src="assets/lost_found/js/jquery.min.js"></script>
			<script src="assets/lost_found/js/jquery.scrolly.min.js"></script>
			<script src="assets/lost_found/js/jquery.scrollex.min.js"></script>
			<script src="assets/lost_found/js/skel.min.js"></script>
			<script src="assets/lost_found/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/lost_found/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/lost_found/js/main.js"></script>
			<script src="assets/js/classie.js"></script>
			<script src="assets/js/menu.js"></script>
		</div></div>
		<?php require('render/menu.php');?>
		</div>
	</body>
</html>