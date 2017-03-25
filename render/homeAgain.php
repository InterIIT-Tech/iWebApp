<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="assets/homeAgain/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/homeAgain/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="assets/homeAgain/css/fullcalendar.css" />
<link rel="stylesheet" href="assets/homeAgain/css/matrix-style.css" />
<link rel="stylesheet" href="assets/homeAgain/css/matrix-media.css" />
<link href="font-awesome/assets/homeAgain/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/homeAgain/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Clubs</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Courses</span></a> </li>
    <li><a href="tables.html"><i class="icon icon-th"></i> <span>Getting Around The Campus</span></a></li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Gallery</span></a></li>
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

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li>
        <li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success">101</span> Widgets </a> </li>
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
                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>Upcoming Events</h5>
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
      <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Courses</h5>
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

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
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
</script>
</body>
</html>
