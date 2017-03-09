<?php
require_once('servConf.php');

function decodeTime($hrs){
	$mins=$hrs%100;
	$mins_ = sprintf("%02d", $mins);
	$hrs=(int)$hrs/100;
	if($hrs>12){ $hrs-=12; return "$hrs:$mins_ pm"; }
	else if($hrs<12){ return "$hrs:$mins_ am"; }
}

$code=$match[1];
$sql = "SELECT `cID`,`branch`,`rating`,`cName`,`img`,`Description` FROM `courses`  WHERE `cCode`= '".$match[1]."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					$name=$row['cName'];
					$rating=$row['rating'];
					$img=$row['img'];
					$desc=$row['Description'];
					$timings='';
					$cID=$row['cID'];
					$timings.="<li>Mondays: </li>";
					switch($row['branch']){
						case 1: $branch="Computer Science and Engineering";break;
						case 2: $branch="Electrical Engineering";break;
						case 3: $branch="Mechanical Engineering";break;
						case 4: $branch="Civil Engineering";break;
						default:$branch="Sometihng?"; break;
					}
				}
			}
$sql = "SELECT `mon`,`mon_`,`tue`,`tue_`,`wed`,`wed_`,`thur`,`thur_`,`fri`,`fri_` FROM `ttable`  WHERE `cCode`= '".$match[1]."'";
			// global $conn;
        	$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
        	if($result){
        		
				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					
					$timings='';
					$timings .="<li>Mondays: ";
					$timings .=($row['mon']==null)?"No scheduled class":decodeTime($row['mon'])." to ".decodeTime($row['mon_']);
					$timings .="</li>";
					$timings .="<li>Tuesdays: ";
					$timings .=($row['tue']==null)?"No scheduled class":decodeTime($row['tue'])." to ".decodeTime($row['tue_']);
					$timings .="</li>";
					$timings .="<li>Wednesday: ";
					$timings .=($row['wed']==null)?"No scheduled class":decodeTime($row['wed'])." to ".decodeTime($row['wed_']);
					$timings .="</li>";
					$timings .="<li>Thursday: ";
					$timings .=($row['thur']==null)?"No scheduled class":decodeTime($row['thur'])." to ".decodeTime($row['thur_']);
					$timings .="</li>";
					$timings .="<li>Friday: ";
					$timings .=($row['fri']==null)?"No scheduled class":decodeTime($row['fri'])." to ".decodeTime($row['fri_']);
					$timings .="</li>";
				}
				if(mysqli_num_rows($result)<1){
        			$timings="No classes scheduled!";	
        		}
			}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $match[1]; ?> | iWebApp</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="../../assets/courses/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../../assets/courses/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="../../assets/courses/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="../../assets/courses/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<a href="../../" class="title">Insti-WebApp</a>
				<nav>
					
				</nav>
			</header>
<a style="color:rgb(85, 216, 255)" href="<?php echo $webRoot;?>/course"><-- Go back to Courses brochure.</a>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major"><?php echo $code.' : '.$name;?></h1>
							<span class="image fit"><img src="../../img/courses/<?php echo $img;?>" alt="" /></span>
							<h2>About Course</h2>
							<p><?php echo $desc;?></p>
							<h2>About Timings:</h2>
							<ul><?php echo $timings;?></ul>
						</div>
					</section>

			</div>
			<div style="height: 50px;"></div>
		<!-- Footer -->
<!-- 			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>Insti-WebApp</li>
					</ul>
				</div>
			</footer> -->

		<!-- Scripts -->
			<script src="../../assets/courses/js/jquery.min.js"></script>
			<script src="../../assets/courses/js/jquery.scrollex.min.js"></script>
			<script src="../../assets/courses/js/jquery.scrolly.min.js"></script>
			<script src="../../assets/courses/js/skel.min.js"></script>
			<script src="../../assets/courses/js/util.js"></script>
			<!--[if lte IE 8]><script src="../../assets/courses/js/ie/respond.min.js"></script><![endif]-->
			<script src="../../assets/courses/js/main.js"></script>

	</body>
</html>