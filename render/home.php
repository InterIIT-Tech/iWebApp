<!DOCTYPE HTML>
<html>
	<head>
		<title>Home::iWebApp</title>
		<link rel="icon" type="image/png" href="favicon.png" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<script>
		 if (location.protocol != 'http:' && ( window.location.hostname=="iwebapp.ml"|| window.location.hostname=="www.iwebapp.ml"))
		 {
		  location.href = 'http:' + window.location.href.substring(window.location.protocol.length);
		 }
	</script>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/home/css/main.css" />

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/modal/css/default.css" />
		<link rel="stylesheet" type="text/css" href="assets/modal/css/component.css" />
		<script src="assets/modal/js/modernizr.custom.js"></script>
		<script>
		$.post("cAPI/viewPost",
                        {
                        	scope:1,
                        	from:'2016-12-11',
                        	to:'2017-10-11'
                        },
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){//$("#myloader").fadeOut();
                                if(data[0]==1){
                            	var dataObject=data[2];
                            	for(var i=0;i<data[1];i++){
	                               $("#news-feed").append('<article><a href="#" class="image"><img src="'+dataObject[i]['image']+'" alt="" /></a><h3>'+dataObject[i]['title']+'</h3><p>'+dataObject[i]['content']+'</p></article>');

                            	}
                            }
                            }else{
                            	// window.location="";
                            	// location.reload(true);
                            	window.location.reload();

                            }
                    }
		        ,"json");

		$.post("cAPI/listAssign",
                        {},
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){
                                if(data[0]==1){
                            	var dataObject=data[2];
                            	for(var i=0;i<data[1];i++){
	                               $("#assign").prepend('<li><a class="assignments_left " href="assignments/view/'+dataObject[i]['aID']+'">'+dataObject[i]['aName']+'</a></li>');

                            	}
                            }
                            }else{
                            	// window.location="";
                            	// location.reload(true);
                            	window.location.reload();

                            }
                    }
		        ,"json");
		$.post("cAPI/classTmw",
                        {},
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){
                                if(data[0]==1){
                            	var dataObject=data[2];
                            	for(var i=0;i<data[1];i++){
	                               $("#clTmw").prepend('<li>'+dataObject[i]+'</li>');

                            	}
                            }
                            }else{
                            	// window.location="";
                            	// location.reload(true);
                            	window.location.reload();

                            }
                    }
		        ,"json");
		$.post("cAPI/getNotif",
                        {},
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                        var href=null;
                            if(status=='success'){//$("#myloader").fadeOut();
                                if(data[0]==1){
                            	var dataObject=data[2];
                            	for(var i=0;i<data[1];i++){
                            		href=(dataObject[i]['url'])?"href="+dataObject[i]['url']:"";
	                               $("#notifPanel").append('<li><a target="_blank" '+href+' alt="Notification sent by:'+dataObject[i]['author']+'">'+dataObject[i]['title']+'</a></li>');

                            	}
                            }
                            }else{
                            	// window.location="";
                            	// location.reload(true);
                            	window.location.reload();

                            }
                    }
		        ,"json");

	$.post("cAPI/getPermissions",
                        {},
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){//$("#myloader").fadeOut();
                               console.log(data);
                               if(data[0]==1){
                               	var ourData=data[2];
                               	for(var i=0;i<data[1];i++){
                               		var type=(ourData[i]['type']==1)?"Course: ":"Club: ";
	                               	$("#scope").append("<option value='"+ourData[i]['cID']+"'>"+type+ourData[i]['cName']+"</option>");
                               	}
                               }else if(data[0]==0){
                               	$(".adminRadio").hide();
                               }
                            }else{
                            	console.log("ajax request error");
                            	$(".adminRadio").hide();
                            	// window.location="";
                            	// location.reload(true);
                            	// window.location.reload();

                            }
                    }
		        ,"json");


		</script>
		<script>
				function submitForm(){
					console.log("submit button clicked!");
			$.post("cAPI/newPost",
                        {
                        title:$("#demo-name").val(),
                        content:$("#demo-message").val(),
                        type:1,
                        notice:0,
                        priority:1,
                        image:$("#imgURL").val(),
                        notify:0,
                        audience:1},
                        function(data, status){
						console.log("AddPost data:"+data);
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){//$("#myloader").fadeOut();
                               if(data[0]==1){
                               	$(".form-el").hide();
                               	$("#new-post-form").html("<h3>Post added!</h3>");
                               	$("#modal-1").fadeOut(3000);
                               	$("#new-post-btn").fadeOut();
                               	//add another post 
                               	// setTimeout(function(){
                               	// $(".form-el").show();

                               	// $("#modal-1").show();
                               	// 	$("#new-post-form").html($("#hiddenC").html());
                               	// },3000);
                               }
                            }else{
                            	// window.location="";
                            	// location.reload(true);
                            	window.location.reload();

                            }
                    }
		        ,"json");
				}
				
		</script>
		<script>
				function notif(){
					console.log("submit button clicked!");
			$.post("cAPI/sendNotif",
                        {
                        content:$("#demo-name").val(),
                        audience:$("#scope").val(),
                        url:$("#url").val()},
                        function(data, status){
						console.log("Notif data:"+data);
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){//$("#myloader").fadeOut();
                               if(data[0]==1){
                               	$(".form-el").hide();
                               	$("#new-post-form").html("<h3>Notif sent!</h3>");
                               	$("#modal-1").fadeOut(3000);
                               	// $("#no").fadeOut();
                               	//add another post 
                               	// setTimeout(function(){
                               	// $(".form-el").show();

                               	// $("#modal-1").show();
                               	// 	$("#new-post-form").html($("#hiddenC").html());
                               	// },3000);
                               }
                            }else{
                            	// window.location="";
                            	// location.reload(true);
                            	window.location.reload();

                            }
                    }
		        ,"json");
				}
				
		</script>
		
		<style>
			#new-post-form *:not(#selectScope){
				margin:10px;
			}
			.assignments_left{
				cursor: pointer !important;
			}
			
			#clTmw a:link {
			    text-decoration: none;
			}
			
		</style>
	</head>
	<body>
	<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3 >New Post:</h3>
				
				<div id="new-post-form">
				<span  class="adminRadio">
					<input type="radio" class="form-el" name="pType" value="reg" onclick="$('#demo-message,#imgURL,#submitpost').fadeIn();$('#scopeSelect,#submitnotif,#url').fadeOut();" checked>Regular Post &nbsp;&nbsp;&nbsp;<input type="radio" onclick="$('#demo-message,#imgURL,#submitpost').fadeOut();$('#scopeSelect,#submitnotif,#url').fadeIn();" name="pType" class="form-el" value="notif"> Notify</span>
					<input type="text"  class="form-el" name="demo-name" id="demo-name" value="" placeholder="Title" class="form-el" style="color:#000000 !important">
					<input type="text" name="demo-name" id="imgURL" value="" placeholder="Image URL" class="form-el" style="color:#000000 !important">
					<input type="text" name="demo-name" id="url" value="" placeholder="Link URL? Default:none" class="form-el" style="display:none;color:#000000 !important">
					<textarea name="demo-message" id="demo-message" placeholder="Text for new Post" class="form-el" rows="6" style="color:#000000 !important"></textarea>
					
					<div id="scopeSelect" class="form-el" style="display: none;">
						scopeSelect:
							<div class="select-wrapper" id="selectScope" >
								<select name="demo-category" id="scope" placeholder="Scope" style="color:#000000 !important">
									<option value="">- Whom to notify -</option>
								</select>
							</div>
					</div>
					
					<button class="" id="submitpost" onclick="submitForm();" class="form-el" style="color: #fff !important;">Post!</button>
					<button class="" id="submitnotif" onclick="notif();" class="form-el" style="color: #fff !important;display:none;">Notify!</button>
					<button onclick="$('#modal-1').removeClass('md-show');">Close me!</button>
				</div>
			</div>
		</div>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div style="cursor:pointer;position: absolute; width:40px;height:40px;background-size: cover; top: 20px; right: 20px;background-image: url('img/logout.png');" onclick="window.location='logout'"></div>
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<p class="logo"><strong>DASHBOARD</strong> </p>
									
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>Hi, <?php $name=explode(" ", $_SESSION['uName']); echo $name[0];?>!</h1>
											<button style="color: #fff !important;" id="new-post-btn" class="md-trigger" data-modal="modal-1">New Post</button>
											<button style="color: #fff !important;" id="new-post-btn" class="md-trigger" data-modal="modal-1">Add Event</button>
											<button style="color: #fff !important;" id="new-post-btn" class="md-trigger" data-modal="modal-1">Assignment Portal</button>
											<button style="color: #fff !important;" id="new-post-btn" class="md-trigger" data-modal="modal-1">Account Settings</button>
										</header>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Navigation</h2>
									</header>
									<div class="features">

										<article>
											<a href="courses">
											<span class="icon fa-diamond"></span>
											<div class="content">
												<h3>Courses</h3>
											</a>
											</div>
										</article>
										<article>
											<a href="timetable">
											<span class="icon fa-paper-plane"></span>
											<div class="content">
												<h3>Time Table</h3>
											</a>
											</div>
										</article>
										<article>
											<a href="clubs">
											<span class="icon fa-rocket"></span>
											<div class="content">
												<h3>Clubs</h3>
											</a>
											</div>
										</article>
										<article>
											<a href="getting-around">
											<span class="icon fa-signal"></span>
											<div class="content">
												<h3>Getting around campus</h3>
											</a>
											</div>
										</article>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Campus Updates</h2>
									</header>
									<div class="posts" id="news-feed">
										
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
	<section><header class="major"><h2>Navigation</h2></header>
	<ul class="contact">
	<li class="fa-arrow-circle-right"><a href="timetable">Timetable</a></li>
	<li class="fa-arrow-circle-right"><a href="courses">Courses</a></li>
	<li class="fa-arrow-circle-right"><a href="clubs">Clubs</a></li>
	<li class="fa-arrow-circle-right"><a href="getting-around">Getting Around Campus</a></li>
	<li class="fa-arrow-circle-right"><a href="lost-found">Lost and Found</a></li>
	</ul>
	</section>
<!-- Menu -->
	<nav id="menu">
		<header class="major">
			<h2>Notifications</h2>
		</header>
		<ul id="notifPanel">
			
		</ul>
	</nav>
						
							
<section>                                     <header class="major">
<h2>Classes tomorrow</h2>                                     </header>
<ul class="classes_tmw contact" id="clTmw">
<li class="fa-arrow-circle-right"><a href="timetable">View Full Timetable:</a></li></ul>
</section>

<section><header class="major"><h2>Pending Assignments</h2></header>
<ul id="assign" class="contact">

<li class="fa-arrow-circle-right"><a href="assignments">Assignment Portal</a></li>
</ul>
</section>
<section>
<header class="major"><h2>Upcomming events</h2></header>
<ul class="contact ">
<li class="fa-arrow-circle-right"><a href="callender">View Full Event callender</a></li></ul>
</section>

							<!-- Footer 
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>-->

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script>
				// this is important for IEs
				var polyfilter_scriptpath = 'assets/modal/js/';
			</script>
			<script src="assets/home/js/jquery.min.js"></script>
			<script src="assets/home/js/skel.min.js"></script>
			<script src="assets/home/js/util.js"></script>
			<script src="assets/modal/js/classie.js"></script>
			<script src="assets/modal/js/modalEffects.js"></script>
			<script src="assets/modal/js/cssParser.js"></script>
			<script src="assets/modal/js/css-filters-polyfill.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/home/js/main.js"></script>

	</body>
</html>
