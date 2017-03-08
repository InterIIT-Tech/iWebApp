<!DOCTYPE HTML>
<html>
	<head>
		<title>IWA - Courses</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!--[if lte IE 8]><script src="assets/courses/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/courses/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/courses/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/courses/css/ie8.css" /><![endif]-->
		<script>
		$(document).ready(function(){

		        $.post("cAPI/getCourse",
                        {},
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){//$("#myloader").fadeOut();
                                var cse = data[0];
                                var ee = data[1];
                                var me = data[2];
                                var ce = data[3];
                                var courseData;
                                var i=0;
                                var currElement;
                                while(i<2){
                                	currElement = cse[i];
                                	console.log(currElement);
                                	courseData ='<section class="">	<a href="#" class="image" style="background-image: url(&quot;img/courses/pic01.jpg&quot;); background-position: center center;"><img src="img/courses/pic01.jpg" alt="" data-position="center center" style="display: none;"></a><div class="content"><div class="inner"><h2>'+currElement[1]+'</h2><p>'+currElement[2]+'</p><ul class="actions"><li><a href="#" class="button">Subscribe</a></li></ul></div></div></section>'; 
                                	i++;
                                	$("#cseCourses").append(courseData);
                                }
                                
                                console.log(data);
                                console.log(data[0]);
 
                            }else{
                            	window.location="";

                            }
                    }
		        ,"json");
		    
		});
		</script>
	</head>
	<body>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Welcome</a></li>
							<li><a href="#cse">Computer Science and Engineering</a></li>
							<li><a href="#ee">Electrical Engineering</a></li>
							<li><a href="#me">Mechanical Engineering</a></li>
							<li><a href="#ce">Civil Engineering</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Courses</h1>
							<p> Subscribe to any course here to never miss any updates.</p>
							<span id = "mobile-nav">
							<ul class="actions vertical">
								<li><a href="#cse" class="button fit scrolly">Computer Science and Engineering</a></li>
								<li><a href="#ee" class="button fit scrolly">Electrical Engineering</a></li>
								<li><a href="#me" class="button fit scrolly">Mechanical Engineering</a></li>
								<li><a href="#ce" class="button fit scrolly">Civil Engineering</a></li>
								</ul>
							</span>
						</div>
					</section>
				<!-- Computer Science Header -->
					<section id="cse" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Computer Science and Engineering</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
						</div>
					</section>

				<!-- Computer Science Course List -->
					<section class="wrapper style2 spotlights" id="cseCourses">
						
					</section>
				<!-- Electrical Header -->
					<section id="ee" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Electrical Engineering</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
						</div>
					</section>

				<!-- Electrical Course List -->
					<section class="wrapper style2 spotlights">
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic01.jpg&quot;); background-position: center center;"><img src="img/courses/pic01.jpg" alt="" data-position="center center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Sed ipsum dolor</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic02.jpg&quot;); background-position: center top;"><img src="img/courses/pic02.jpg" alt="" data-position="top center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Feugiat consequat</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic03.jpg&quot;); background-position: 25% 25%;"><img src="img/courses/pic03.jpg" alt="" data-position="25% 25%" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Ultricies aliquam</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
					<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic01.jpg&quot;); background-position: center center;"><img src="img/courses/pic01.jpg" alt="" data-position="center center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Sed ipsum dolor</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section><section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic02.jpg&quot;); background-position: center top;"><img src="img/courses/pic02.jpg" alt="" data-position="top center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Feugiat consequat</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section></section>
				<!-- Mechanical Header -->
					<section id="me" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Mechanical Engineering</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
						</div>
					</section>

				<!-- Mechanical Course List -->
					<section class="wrapper style2 spotlights">
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic01.jpg&quot;); background-position: center center;"><img src="img/courses/pic01.jpg" alt="" data-position="center center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Sed ipsum dolor</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic02.jpg&quot;); background-position: center top;"><img src="img/courses/pic02.jpg" alt="" data-position="top center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Feugiat consequat</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic03.jpg&quot;); background-position: 25% 25%;"><img src="img/courses/pic03.jpg" alt="" data-position="25% 25%" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Ultricies aliquam</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
					<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic01.jpg&quot;); background-position: center center;"><img src="img/courses/pic01.jpg" alt="" data-position="center center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Sed ipsum dolor</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section><section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic02.jpg&quot;); background-position: center top;"><img src="img/courses/pic02.jpg" alt="" data-position="top center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Feugiat consequat</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section></section>
				<!-- Civil Engineering Header -->
				<section id="ce" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Civil engineering</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
						</div>
					</section>

				<!-- Civil Engineering Course List -->
					<section class="wrapper style2 spotlights">
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic01.jpg&quot;); background-position: center center;"><img src="img/courses/pic01.jpg" alt="" data-position="center center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Sed ipsum dolor</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic02.jpg&quot;); background-position: center top;"><img src="img/courses/pic02.jpg" alt="" data-position="top center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Feugiat consequat</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic03.jpg&quot;); background-position: 25% 25%;"><img src="img/courses/pic03.jpg" alt="" data-position="25% 25%" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Ultricies aliquam</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section>
					<section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic01.jpg&quot;); background-position: center center;"><img src="img/courses/pic01.jpg" alt="" data-position="center center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Sed ipsum dolor</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section><section class="">
							<a href="#" class="image" style="background-image: url(&quot;img/courses/pic02.jpg&quot;); background-position: center top;"><img src="img/courses/pic02.jpg" alt="" data-position="top center" style="display: none;"></a>
							<div class="content">
								<div class="inner">
									<h2>Feugiat consequat</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Subscribe</a></li>
									</ul>
								</div>
							</div>
						</section></section>
			</div>

		<!-- Scripts -->
			<script src="assets/courses/js/jquery.min.js"></script>
			<script src="assets/courses/js/jquery.scrollex.min.js"></script>
			<script src="assets/courses/js/jquery.scrolly.min.js"></script>
			<script src="assets/courses/js/skel.min.js"></script>
			<script src="assets/courses/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/courses/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/courses/js/main.js"></script>

	</body>
</html>