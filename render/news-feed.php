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

  h2{
    position: fixed;
    left: 45%;
    top: 5%;
    font-size: 5em;
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
  <h1></h1>
  <h2>::iWebApp</h2>
</div>
<!--close-Header-part-->



<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Menu</a>
  <ul>
    <li><a href="homeAgain"><i class="icon icon-home"></i> <span>Home</span></a> </li>
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

<!--End-Action boxes-->
<style>
.img-post{
  margin: 1em auto;
  display: block;
}
.desc-post{
  margin-left: 1em;
  padding: 1em;
  /*max-height: 10em;*/
  overflow: auto;
}
</style>
<!--Chart-box-->
<!--End-Chart-box-->
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly">
            <h4 style="text-align:center">Title1</h4>
          </div>
          <div>
          <img class="img-post" src="favicon.png">
        </div>
          <p class="desc-post">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
          </div>

          <div class="widget-box">
            <div class="widget-title bg_ly">
              <h4 style="text-align:center">Title1</h4>
            </div>
            <div>
            <img class="img-post" src="favicon.png">
          </div>
            <p class="desc-post">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>

    </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly">
            <h4 style="text-align:center">Title1</h4>
          </div>
          <div>
          <img class="img-post" src="favicon.png">
        </div>
          <p class="desc-post">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>

          <div class="widget-box">
            <div class="widget-title bg_ly">
              <h4 style="text-align:center">Title1</h4>
            </div>
            <div>
            <img class="img-post" src="favicon.png">
          </div>
            <p class="desc-post">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
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
