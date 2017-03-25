<!DOCTYPE HTML>
<!--
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<style media="screen" type="text/css">
		.layer1_class { position: absolute; z-index: 1; top: 0px; left: 0px; visibility: visible;height: 100%;width: 100%;background-color: white;}
		.layer2_class { visibility: hidden }
	</style>
	<script>
		function downLoad(){
			$("body").css("overflow","auto");
			if(localStorage.getItem("lastPage")==window.location){
					var del = 0;	
				}else{
					var del = 750;	
				}
			$("body").animate("left:0px",del,function(){
			if (document.all){
					document.all["layer1"].style.visibility="hidden";
					document.all["layer2"].style.visibility="visible";
			} else if (document.getElementById){
					node = document.getElementById("layer1").style.visibility='hidden';
					node = document.getElementById("layer2").style.visibility='visible';
			}
		localStorage.setItem("lastPage",window.location);
		});
		}
	</script>
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
	<body style="overflow:hidden;" onload="downLoad()">

		<div id="layer1" class="layer1_class">
			<img src="favicon.png" style=" display: block;position: fixed;left: 50%;top:17%;transform: translate(-50%,-50%);">
			<img src="loading.gif" style="display:block;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:20%;">
		</div>

		<div id="layer2" class="layer2_class">
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
					<?php
						$sql = "SELECT `title`,`user`,`path` FROM `gallery` ";
						// global $conn;
			        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
			        	if($result && mysqli_num_rows($result)>0){
			            	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			            		echo "<article class='thumb'>";
			            		echo "<a href='".$row['path']."' class='image'><img src='".$row['path']."' /></a>
							<h2>".$row['title']."</h2>

						</article>";
			            	}
			            }
					?>

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
	</div>
	</body>
</html>
