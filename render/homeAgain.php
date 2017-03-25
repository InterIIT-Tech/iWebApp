<!DOCTYPE html>
<html lang="en">
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
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="assets/homeAgain/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/homeAgain/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="assets/homeAgain/css/fullcalendar.css" />
<link rel="stylesheet" href="assets/homeAgain/css/matrix-style.css" />
<link rel="stylesheet" href="assets/homeAgain/css/matrix-media.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="font-awesome/assets/homeAgain/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/homeAgain/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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
<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html"></a></h1>
</div>
<!--close-Header-part-->



<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Menu</a>
  <ul>
    <li class="active"><a href="."><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li class="active"><a href="news-feed"><i class="icon icon-home"></i> <span>News Feed</span></a> </li>
    <li> <a href="clubs"><i class="icon icon-signal"></i> <span>Clubs</span></a> </li>
    <li> <a href="courses"><i class="icon icon-inbox"></i> <span>Courses</span></a> </li>
    <li><a href="getting-around"><i class="icon icon-th"></i> <span>Getting Around</span></a></li>
    <li><a href="gallery"><i class="icon icon-fullscreen"></i> <span>Gallery</span></a></li>
    <li><a href="timetable"><i class="icon icon-fullscreen"></i> <span>Time Table</span></a></li>
    <li><a href="assignments"><i class="icon icon-fullscreen"></i> <span>Assignments</span></a></li>
    <li><a href="lost-found"><i class="icon icon-fullscreen"></i> <span>Lost and Found</span></a></li>
    <li class="content"> <span>Attendance</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">x / y days</div>
    </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
<style>
input[type="text"]{
  height: 2.75em;
  background: #ffffff;
    border-radius: 0.375em;
    border: none;
    border: solid 1px rgba(210, 215, 217, 0.75);
    color: inherit;
    display: block;
    outline: 0;
    padding: 0 1em;
    text-decoration: none;
    width: 100%;
}

textarea{
  moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    background: #ffffff;
    border-radius: 0.375em;
    border: none;
    border: solid 1px rgba(210, 215, 217, 0.75);
    color: inherit;
    display: block;
    outline: 0;
    padding: 0 1em;
    text-decoration: none;
    width: 100%;
    padding:0.75em 1em;
}

#submitpost, #submitnotif, #bb{
  color: #fff !important;
  margin: 10px;
  font-size: 0.8em;
  border: none;
  margin-left: 0.2em !important;
    /* padding: 0.6em 1.2em; */
    background: #c0392b !important;
    color: #fff;
    font-family: 'Lato', Calibri, Arial, sans-serif;
    text-transform: uppercase;
    cursor: pointer;
    display: block;
    margin: 3px 2px;
    border-radius: 2px;
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    -moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    -ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    background-color: transparent;
    border-radius: 0.375em;
    border: 0;
    box-shadow: inset 0 0 0 2px #f56a6a;
    font-family: "Roboto Slab", serif;
    font-size: 0.8em;
    font-weight: 700;
    height: 3.5em;
    letter-spacing: 0.075em;
    line-height: 3.5em;
    padding: 0 2.25em;
    text-align: center;
    text-decoration: none;
    white-space: nowrap;
}
</style>
<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <div class="md-modal md-effect-1" id="modal-1">
      			<div class="md-content">
      				<h3 >New Post:</h3>

      				<div id="new-post-form">
      				<span  class="adminRadio">
      					<input type="radio" class="form-el" name="pType" value="reg" onclick="$('#demo-message,#imgURL,#submitpost,#uploadimage_').fadeIn();$('#scopeSelect,#submitnotif,#url').fadeOut();" checked>Regular Post &nbsp;&nbsp;&nbsp;<input type="radio" onclick="$('#demo-message,#imgURL,#submitpost,#uploadimage_').fadeOut();$('#scopeSelect,#submitnotif,#url').fadeIn();" name="pType" class="form-el" value="notif"> Notify</span>
      					<input type="text"  class="form-el" name="demo-name" id="demo-name" value="" placeholder="Title" class="form-el" style="color:#000000 !important" required>
      					<input type="hidden" name="demo-name" id="imgURL" value="" placeholder="Image URL" class="form-el" style="color:#000000 !important">
      					<form id="uploadimage_" action="" method="post" enctype="multipart/form-data">
      					<div id="selectImage"><h4 style="font-size:1.1em;text-align:left;margin-left:-0.3em;margin-top:1em;">Upload Image:</h4>
      					<input type="file" class="form-el" style="    padding: 10px;background-color: #b1330d;color: #FFFFFF;border-radius: 10px;height:auto;" name="file" id="file_" required />
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
      					<button id="bb" onclick="$('#modal-1').removeClass('md-show');">Close me!</button>
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
                  <input type="file" class="form-el" style="padding: 10px;background-color: #b1330d;color: #FFFFFF;border-radius: 10px;height:auto;" name="file" id="file" required />
                  </div>
                   <input id="bb" type="submit" class="form-el" style="background-color: #A5281B;" value="Submit">
                  </form>
                  <div id="loading" style="display:none;background-image:url('img/load.gif'); background-position: center; width:100px;height: 100px;margin:auto; "></div>
                  <div id="message"></div>
                  <!-- <button class="" id="submitpost" onclick="submitForm();" class="form-el" style="color: #fff !important;">Upload!</button> -->
                  <button id="bb" onclick="$('#modal-3').removeClass('md-show');" style="margin-left:0.8em !important;">Close me!</button>
                </div>
              </div>
            </div>
         <li class="bg_lb md-trigger" id="new-post-btn" data-modal="modal-1" onclick="$('#modal-1').addClass('md-show');"> <a> <i class="icon-dashboard"></i>   <!--<span class="label label-important">20</span> --> Add Post </a> </li>
        <li class="bg_ly md-trigger" style="display: none;" id="new-post-btn" data-modal="modal-2" onclick="$('#modal-2').addClass('md-show');"> <a>  <i class="icon-inbox"></i><!--<span class="label label-success">101</span>-->Add Event</a> </li>
        <li class="bg_ly md-trigger" id="new-post-btn" data-modal="modal-3" onclick="$('#modal-3').addClass('md-show');"> <a>  <i class="icon-inbox"></i><!--<span class="label label-success">101</span>--> Upload Image </a> </li>
      </ul>
    </div>
<!--End-Action boxes-->

<!--Chart-box-->
<!--End-Chart-box-->
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Notifications</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                </div>
              <li>
                <!-- <button class="btn btn-warning btn-mini">View All</button> -->
              </li>
            </ul>
          </div>
        </div>
      <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Upcoming Events</h5>
          </div>
          <div class="widget-content nopadding updates collapse in" id="collapseG3">
            <div class="new-update clearfix"><i class="icon-ok-sign"></i>
              <div class="update-done"><a title="" href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></a> <span>dolor sit amet, consectetur adipiscing eli</span> </div>
              <div class="update-date"><span class="update-day">20</span>jan</div>
            </div>
            <div class="new-update clearfix"> <i class="icon-gift"></i> <span class="update-notice"> <a title="" href="#"><strong>Congratulation Maruti, Happy Birthday </strong></a> <span>many many happy returns of the day</span> </span> <span class="update-date"><span class="update-day">11</span>jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="" href="#"><strong>Maruti is a Responsive Admin theme</strong></a> <span>But already everything was solved. It will ...</span> </span> <span class="update-date"><span class="update-day">07</span>Jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-leaf"></i> <span class="update-done"> <a title="" href="#"><strong>Envato approved Maruti Admin template</strong></a> <span>i am very happy to approved by TF</span> </span> <span class="update-date"><span class="update-day">05</span>jan</span> </div>
            <div class="new-update clearfix"> <i class="icon-question-sign"></i> <span class="update-notice"> <a title="" href="#"><strong>I am alwayse here if you have any question</strong></a> <span>we glad that you choose our template</span> </span> <span class="update-date"><span class="update-day">01</span>jan</span> </div>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>Courses</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
                <li class="clearfix">
                  <div class="txt"> Luanch This theme on Themeforest <span class="by label">Alex</span></div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> Manage Pending Orders <span class="date badge badge-warning">Today</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> MAke your desk clean <span class="by label">Admin</span></div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> Today we celebrate the theme <span class="date badge badge-info">08.03.2013</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
                <li class="clearfix">
                  <div class="txt"> Manage all the orders <span class="date badge badge-important">12.03.2013</span> </div>
                  <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-repeat"></i></span>
            <h5>Assignments</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="activity-list">
              <li><a href="#"> <i class="icon-user"></i> <strong>Themeforest</strong>Approved My college theme <strong>1 user</strong> <span>2 hours ago</span> </a></li>
              <li><a href="#"> <i class="icon-file"></i> <strong>My College is PSD Template </strong> Theme <strong>Psd Theme</strong> <span>2months ago</span> </a></li>
              <li><a href="#"> <i class="icon-envelope"></i> <strong>Lorem ipsum doler set</strong> adag<strong>agg</strong> <span>2 days ago</span> </a></li>
              <li><a href="#"> <i class="icon-picture"></i> <strong>ITs my First Admin</strong> so very<strong>exited</strong> <span>2 days ago</span> </a></li>
              <li><a href="#"> <i class="icon-user"></i> <strong>Admin</strong> bans <strong>3 users</strong> <span>week ago</span> </a></li>
            </ul>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-repeat"></i></span>
            <h5>Tomorrow's Classes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Timing</th>
                  <th>Subjectx</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="label">Default</span></td>
                  <td><code>&lt;span class="label"&gt;</code></td>
                </tr>
                <tr>
                  <td><span class="label label-success">Success</span></td>
                  <td><code>&lt;span class="label label-success"&gt;</code></td>
                </tr>
                <tr>
                  <td><span class="label label-warning">Warning</span></td>
                  <td><code>&lt;span class="label label-warning"&gt;</code></td>
                </tr>
                <tr>
                  <td><span class="label label-important">Important</span></td>
                  <td><code>&lt;span class="label label-important"&gt;</code></td>
                </tr>
                <tr>
                  <td><span class="label label-info">Info</span></td>
                  <td><code>&lt;span class="label label-info"&gt;</code></td>
                </tr>
                <tr>
                  <td><span class="label label-inverse">Inverse</span></td>
                  <td><code>&lt;span class="label label-inverse"&gt;</code></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Bus Time Table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Destination</th>
                  <th>1st</th>
                  <th>2nd</th>
                  <th>3rd</th>
                  <th>4th</th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td class="center">D1</td>
                  <td class="center">time1</td>
                  <td class="center">time2</td>
                  <td class="center">time3</td>
                  <td class="center">time4</td>
                </tr>
                <tr class="even gradeC">
                  <td class="center">D1</td>
                  <td class="center">time1</td>
                  <td class="center">time2</td>
                  <td class="center">time3</td>
                  <td class="center">time4</td>
                </tr>
                <tr class="odd gradeA">
                  <td class="center">D1</td>
                  <td class="center">time1</td>
                  <td class="center">time2</td>
                  <td class="center">time3</td>
                  <td class="center">time4</td>
                </tr>
                <tr class="even gradeA">
                  <td class="center">D1</td>
                  <td class="center">time1</td>
                  <td class="center">time2</td>
                  <td class="center">time3</td>
                  <td class="center">time4</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<!--end-Footer-part-->

<script src="assets/homeAgain/js/excanvas.min.js"></script>
<script src="assets/homeAgain/js/jquery.min.js"></script>
<script src="assets/homeAgain/js/jquery.ui.custom.js"></script>
<script src="assets/homeAgain/js/bootstrap.min.js"></script>
<script src="assets/homeAgain/js/jquery.flot.min.js"></script>
<script src="assets/homeAgain/js/jquery.flot.resize.min.js"></script>
<script src="assets/homeAgain/js/jquery.peity.min.js"></script>
<script src="assets/homeAgain/js/fullcalendar.min.js"></script>
<script src="assets/homeAgain/js/matrix.js"></script>
<script src="assets/homeAgain/js/matrix.dashboard.js"></script>
<script src="assets/homeAgain/js/jquery.gritter.min.js"></script>
<script src="assets/homeAgain/js/matrix.interface.js"></script>
<script src="assets/homeAgain/js/matrix.chat.js"></script>
<script src="assets/homeAgain/js/jquery.validate.js"></script>
<script src="assets/homeAgain/js/matrix.form_validation.js"></script>
<script src="assets/homeAgain/js/jquery.wizard.js"></script>
<script src="assets/homeAgain/js/jquery.uniform.js"></script>
<script src="assets/homeAgain/js/select2.min.js"></script>
<script src="assets/homeAgain/js/matrix.popover.js"></script>
<script src="assets/homeAgain/js/jquery.dataTables.min.js"></script>
<script src="assets/homeAgain/js/matrix.tables.js"></script>
<script src="assets/modal/js/classie.js"></script>
<script src="assets/modal/js/modalEffects.js"></script>
<script src="assets/modal/js/cssParser.js"></script>
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
    console.log("dasdsad");
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
<!-- <script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page - reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script> -->
</div>
</body>
</html>
