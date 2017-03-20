<!DOCTYPE HTML>
<!--
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Gallery::iWebApp</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/gallery/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/gallery/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/gallery/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/gallery/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<script src="assets/js/modernizr.custom.25376.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
			$(document).ready(function(){
				//alert("hi");
				var stat=0;
				$("#showMenu").click(function(){
					$('#header').fadeOut();
					stat=1;
				});
				$(".container").click(function(){
					if(stat==1){
						$('#header').fadeIn()
						stat=0;
					}
				});
			});
		</script>
	</head>
	<body>
	<!-- Header -->
	<header id="header">
		<h1><a href="."><strong>Gallery </strong><span style="text-transform: none;"> :: iWebApp</span></a></h1>
		<nav>
			<ul>
				<li><a href="#back" class="icon fa-bars" id="showMenu" >Menu</a></li>
			</ul>
		</nav>
	</header>
	<div id="perspective" class="perspective effect-airbnb">
			<div class="container">
				<div class="wrapper">
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
<!-- 					<header id="header">
						<h1><a href="."><strong>Gallery </strong><span style="text-transform: none;"> :: iWebApp</span></a></h1>
						<nav>
							<ul>
								<li><a href="#back" class="icon fa-bars" >Menu</a></li>
							</ul>
						</nav>
					</header> -->
				<!-- Main -->
					<div id="main">
						<article class="thumb">
							<a href="img/fulls/01.jpg" class="image"><img src="img/thumbs/01.jpg" alt="" /></a>
							<h2>Magna feugiat lorem</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/02.jpg" class="image"><img src="img/thumbs/02.jpg" alt="" /></a>
							<h2>Nisl adipiscing</h2>						
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/03.jpg" class="image"><img src="img/thumbs/03.jpg" alt="" /></a>
							<h2>Tempus aliquam veroeros</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/04.jpg" class="image"><img src="img/thumbs/04.jpg" alt="" /></a>
							<h2>Aliquam ipsum sed dolore</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/05.jpg" class="image"><img src="img/thumbs/05.jpg" alt="" /></a>
							<h2>Cursis aliquam nisl</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/06.jpg" class="image"><img src="img/thumbs/06.jpg" alt="" /></a>
							<h2>Sed consequat phasellus</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/07.jpg" class="image"><img src="img/thumbs/07.jpg" alt="" /></a>
							<h2>Mauris id tellus arcu</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/08.jpg" class="image"><img src="img/thumbs/08.jpg" alt="" /></a>
							<h2>Nunc vehicula id nulla</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/09.jpg" class="image"><img src="img/thumbs/09.jpg" alt="" /></a>
							<h2>Neque et faucibus viverra</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/10.jpg" class="image"><img src="img/thumbs/10.jpg" alt="" /></a>
							<h2>Mattis ante fermentum</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/11.jpg" class="image"><img src="img/thumbs/11.jpg" alt="" /></a>
							<h2>Sed ac elementum arcu</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
						<article class="thumb">
							<a href="img/fulls/12.jpg" class="image"><img src="img/thumbs/12.jpg" alt="" /></a>
							<h2>Vehicula id nulla dignissim</h2>
							<p>Nunc blandit nisi ligula magna sodales lectus elementum non. Integer id venenatis velit.</p>
						</article>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/gallery/js/jquery.min.js"></script>
			<script src="assets/gallery/js/jquery.poptrox.min.js"></script>
			<script src="assets/gallery/js/skel.min.js"></script>
			<script src="assets/gallery/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/gallery/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/gallery/js/main.js"></script>
			<script src="assets/js/classie.js"></script>
			<script src="assets/js/menu.js"></script>
		</div></div>
		<?php require('render/menu.php');?>
		</div>
	</body>
</html>