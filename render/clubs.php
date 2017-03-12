<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="http://iwebapp.ml/favicon.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<title>Hyperspace by HTML5 UP</title>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/courses/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/courses/css/main.css" />
		<script src="assets/js/modernizr.custom.25376.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				var stat=0;
				$("#showMenu").click(function(){
					$(".mysidebar").fadeOut();
					stat=1;
				});
				$(".container").click(function(){
					if(stat==1 && $(window).width()>723){
						$(".mysidebar").fadeIn();
						stat=0;
					}
				});
				$("#mobile-show-menu").click(function(){
					$('#showMenu').trigger('click');
				});
			});
		</script>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/courses/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/courses/css/ie8.css" /><![endif]-->
	<style>
			.wrapper.fullscreen {
				min-height: 40vh !important;
			}
			.outer-nav.right {
				left:10%;
			}
			#mobile-show-menu {
				font-family: fontAwesome;
				font-size: 30px;
				position:fixed;
				color: #312450;
				right: 20px;
				top: 10px; 
				z-index: 1000;
			}
		}
	</style>
	</head>
	<body>
	<div id="perspective" class="perspective effect-airbnb">
	<div id="mobile-show-menu" href="#back"></div>
	<!-- Sidebar -->
			<section id="sidebar" class="mysidebar">
				<div class="inner">
					<nav>
						<ul><li><button class="button special" id="showMenu" style="margin:auto;" href="#back">Show Menu</button></li>
							<li><a href="#intro">Welcome</a></li>
							<li><a href="#cse">NJACK</a></li>
							<li><a href="#ee">Sparkonics</a></li>
							<li><a href="#me">SCME</a></li>
							<li><a href="#ce">E-Club</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<div class="container">
				<div class="wrapper">
		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul><li><button>Show Menu</button></li>
							<li><a href="#intro">Welcome</a></li>
							<li><a href="#cse">NJACK</a></li>
							<li><a href="#ee">Sparkonics</a></li>
							<li><a href="#me">SCME</a></li>
							<li><a href="#ce">E-Club</a></li>
						</ul>
					</nav>
				</div>
			</section>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Clubs</h1>
							<p> Subscribe to any club here to never miss any updates.</p>
							<span id = "mobile-nav">
								<ul class="actions vertical">
								<li><a href="#cse" class="button fit scrolly">NJACK</a></li>
								<li><a href="#ee" class="button fit scrolly">Sparkonics</a></li>
								<li><a href="#me" class="button fit scrolly">SCME</a></li>
								<li><a href="#ce" class="button fit scrolly">E-Club</a></li>
								</ul>
							</span>
						</div>
					</section>
				<!-- Computer Science Header -->
					<section id="cse" class="wrapper style2 fade-up">
						<div class="inner">
							<h2>NJACK</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
							</ul>
						</div>
					</section>

				
				<!-- Electrical Header -->
					<section id="ee" class="wrapper style2 fade-up">
						<div class="inner">
							<h2>Sparkonics</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
							</ul>
						</div>
					</section>

				<!-- Mechanical Header -->
					<section id="me" class="wrapper style2 fade-up">
						<div class="inner">
							<h2>SCME</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
							</ul>
						</div>
					</section>

				<!-- E-Club Header -->
				<section id="ce" class="wrapper style2 fade-up">
						<div class="inner">
							<h2>E-Club</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
							</ul>
						</div>
					</section>
			</div>

		<!-- Scripts -->
			<script src="assets/courses/js/jquery.min.js"></script>
			<script src="assets/courses/js/jquery.scrollex.min.js"></script>
			<script src="assets/courses/js/jquery.scrolly.min.js"></script>
			<script src="assets/courses/js/skel.min.js"></script>
			<script src="assets/courses/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/courses/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/courses/js/main.js"></script>
			<script src="assets/js/classie.js"></script>
		<script src="assets/js/menu.js"></script>
</div></div>
<nav class="outer-nav right vertical">
				<a href="#" class="icon-home">Home</a>
				<a href="#" class="icon-news">News</a>
				<a href="#" class="icon-image">Images</a>
				<a href="#" class="icon-upload">Uploads</a>
				<a href="#" class="icon-star">Favorites</a>
				<a href="#" class="icon-mail">Messages</a>
				<a href="#" class="icon-lock">Security</a>
			</nav>
</div>
	</body>
</html>