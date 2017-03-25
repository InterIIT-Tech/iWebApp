<!DOCTYPE HTML>
<html>
	<head>
		<style media="screen" type="text/css">
			.layer1_class { position: absolute; z-index: 1; top: 0px; left: 0px; visibility: visible;height: 100%;width: 100%;}
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
                            		if(dataObject[i]['title']!=""){

	                               $("#news-feed").append('<article><a class="image"><img src="'+dataObject[i]['image']+'" alt="" /></a><h3>'+dataObject[i]['title']+'</h3><p>'+dataObject[i]['content']+'</p></article>');

                            		}
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
                               	$("#add-event-btn").show();
																$("#add-image-btn").show();
                               }else if(data[0]==0){
                               	// If non-admin
                               	$(".adminRadio").hide();
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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<script>
			//Datepicker for the forms
				// $( function() {
			 //    $( "#datepicker" ).datepicker({
			 //      changeMonth: true,
			 //      changeYear: true,
			 //      minDate: new Date(1910,0,1),
			 //      maxDate: new Date(2017,1,22),
			 //      yearRange: '1910:2017',
			 //      dateFormat:'yy-mm-dd'
			 //    });
			 //  } );
		 //   $(document).ready(function(){
			// $("#datepicker").keydown(function(e){e.preventDefault();});
			// });
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
	<body style="overflow:hidden;" onload="downLoad()">
		<div id="layer1" class="layer1_class">
			<img src="favicon.png" style=" display: block;position: fixed;left: 50%;top:17%;transform: translate(-50%,-50%);">
			<img src="loading.gif" style="display:block;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:20%;">
		</div>

	<div id="layer2" class="layer2_class">
	<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3 >New Post:</h3>

				<div id="new-post-form">
				<span  class="adminRadio">
					<input type="radio" class="form-el" name="pType" value="reg" onclick="$('#demo-message,#imgURL,#submitpost,#uploadimage_').fadeIn();$('#scopeSelect,#submitnotif,#url').fadeOut();" checked>Regular Post &nbsp;&nbsp;&nbsp;<input type="radio" onclick="$('#demo-message,#imgURL,#submitpost,#uploadimage_').fadeOut();$('#scopeSelect,#submitnotif,#url').fadeIn();" name="pType" class="form-el" value="notif"> Notify</span>
					<input type="text"  class="form-el" name="demo-name" id="demo-name" value="" placeholder="Title" class="form-el" style="color:#000000 !important" required>
					<input type="hidden" name="demo-name" id="imgURL" value="" placeholder="Image URL" class="form-el" style="color:#000000 !important">
					<form id="uploadimage_" action="" method="post" enctype="multipart/form-data">
					<div id="selectImage"><h4>Upload Image:</h4>
					<input type="file" class="form-el" style="    padding: 10px;background-color: #b1330d;color: #FFFFFF;border-radius: 10px;" name="file" id="file_" required />
					</div>
					 <input type="submit" id="subbtn" class="form-el" style="display: none; background-color: #A5281B;" value="Submit">
					</form>
					<div id="loading" style="display:none;background-image:url('img/load.gif'); background-position: center; width:100px;height: 100px;margin:auto; "></div>
					<div id="message"></div>
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
	<div class="md-modal md-effect-1" id="modal-2">
		<div class="md-content">
				<h3>Add Event:</h3>

				<div id="new-post-form">
					<input type="text" class="form-el" name="demo-name" id="demo-name" value="" placeholder="Title" style="color:#000000 !important">

					<input type="text" name="demo-name" id="datepicker" value="" placeholder="yyyy-mm-dd" class="form-el" style="color: rgb(0, 0, 0) !important; display: block;">

					<div id="scopeSelect" class="form-el" style="display: block;">
						scopeSelect:
							<div class="select-wrapper" id="selectScope">
								<select name="demo-category" id="scope" placeholder="Scope" style="color:#000000 !important">
									<option value="">- Whom to notify -</option>
								</select>
							</div>
					</div>

					<button class="" id="submitpost" onclick="submitForm();" style="color: rgb(255, 255, 255) !important; display: none;">Post!</button>
					<button class="" id="submitnotif" onclick="notif();" style="color: rgb(255, 255, 255) !important; display: block;">Add event</button>
					<button onclick="$('#modal-2').removeClass('md-show');">Close me!</button>
				</div>
		</div>
	</div>
	<div class="md-modal md-effect-1" id="modal-3">
			<div class="md-content">
				<h3 >Upload Image for Gallery:</h3>

				<div id="new-post-form">

					<form id="uploadimage" action="" method="post" enctype="multipart/form-data">

					<input type="text" name="title_name" id="url" value="" placeholder="Title of Image" class="form-el" style="color:#000000 !important">
					<div id="image_preview"><img id="previewing" src="favicon.png" style="max-width: 90%; max-height: 200px;display:block;margin:auto" /></div>
					<hr id="line">
					<div id="selectImage">
					<label>Select Your Image</label>
					<input type="file" class="form-el" style="    padding: 10px;background-color: #b1330d;color: #FFFFFF;border-radius: 10px;" name="file" id="file" required />
					</div>
					 <input type="submit" class="form-el" style="background-color: #A5281B;" value="Submit">
					</form>
					<div id="loading" style="display:none;background-image:url('img/load.gif'); background-position: center; width:100px;height: 100px;margin:auto; "></div>
					<div id="message"></div>
					<!-- <button class="" id="submitpost" onclick="submitForm();" class="form-el" style="color: #fff !important;">Upload!</button> -->
					<button onclick="$('#modal-3').removeClass('md-show');" style="margin-left:1.5em">Close me!</button>
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

											<button style="color: #fff !important;" class="md-trigger" data-modal="modal-1" id="new-post-btn">New Post</button>
											<button style="color: #fff !important; display: none;" class="md-trigger" onclick="$('#modal-2').addClass('md-show');" data-modal="modal-2" id="add-event-btn">Add Event</button>
											<button style="color: #fff !important;" class="md-trigger" onclick="$('#modal-3').addClass('md-show');" data-modal="modal-3" id="add-upload-btn">Upload Image</button>
<!-- 											<button style="color: #fff !important;" id="new-post-btn" class="md-trigger" data-modal="modal-1">Assignment Portal</button>
											<button style="color: #fff !important;" id="new-post-btn" class="md-trigger" data-modal="modal-1">Account Settings</button> -->

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
<header class="major"><h2>Upcoming events</h2></header>
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
			<script>

				$(document).ready(function (e) {

				$("#file_").change(function(e){
					e.preventDefault();
					$("#subbtn").click();
				});
				$("#uploadimage_").on('submit',(function(e) {
				e.preventDefault();
				$("#message").empty();
				$('#loading').show();
				$.ajax({
				url: "upl/post", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{
					console.log(data);
				$('#loading').hide();
				if(data!=-1){
					$("#selectImage").empty();
					$("#selectImage").html("<h4>Image uploaded</h4>");
					$("#imgURL").val(data);
					console.log("works");
				}else{
					$("#message_").html(data);
				}
				}
				});
				}));

				$("#uploadimage").on('submit',(function(e) {
				e.preventDefault();
				$("#message").empty();
				$('#loading').show();
				$.ajax({
				url: "upl/gallery", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{
					console.log(data);
				$('#loading').hide();
				if(data==1){
					$("#modal-3").fadeOut(1000);
					$("#modal-3 .md-content h3").text("Uploaded!");
                    $("#new-post-form").hide();
                    $("#add-upload-btn").hide();
					// console.log("works");
				}else{
					$("#message").html(data);
				}
				}
				});
				}));

				// Function to preview image after validation
				$(function() {
				$("#file").change(function() {
				$("#message").empty(); // To remove the previous error message
				var file = this.files[0];
				var imagefile = file.type;
				var match= ["image/jpeg","image/png","image/jpg"];
				if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
				{
				$('#previewing').attr('src','noimage.png');
				$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
				return false;
				}
				else
				{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
				}
				});
				});
				function imageIsLoaded(e) {
				$("#file").css("color","green");
				$('#image_preview').css("display", "block");
				$('#previewing').attr('src', e.target.result);
				$('#previewing').attr('margin', 'auto');
				};
				});
</script>
	</body>
</html>
