<?php
require_once('servConf.php');
require_once('api/api.php');
$flag=0;
$lost=new lostAPI;

if(isset($_POST['lName'])){
	$lost->lost($_POST['lContact'],$_POST['lName']);
	// echo $_POST['lContact'].$_POST['lName'];
	// $store = $lost->search(-1);
	$flag=1;//flag to let later part of html render know that certain parts need to be shown

}else if(isset($_POST['fName'])){
	$flag=2;
	$lost->found($_POST['fContact'],$_POST['fName'],$_POST['fPlace']);
	//flag to let later part of html render know that certain parts need to be shown
}else{
	//default
	$temp = $lost->getAll();
	$store =$temp[2];
} 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Lost_found</title>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/lost_found/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/lost_found/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/lost_found/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/lost_found/css/ie8.css" /><![endif]-->
		<script src="assets/js/modernizr.custom.25376.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#showMenu').click(function(){
					$('.outer-nav').fadeOut(0).fadeIn(400);
				});
				$(".container").click(function(){
					$('.outer-nav').fadeOut(100);
				});
				<?php
					if($flag==1){
						echo '$("#lostForm").hide();'.PHP_EOL;
						echo '$("#foundForm").hide();'.PHP_EOL;
						echo '$("#info2").html("We have registered your query.<br>So far, the following match your query. We\'ll notify you once some more posts match your query.")'.PHP_EOL;
					}
					if($flag==2){
						echo '$("#info").html("Thanks for finding the lost item. You will soon be contacted.")'.PHP_EOL;
						echo '$("#lostForm").hide();'.PHP_EOL;
						echo '$("#foundForm").hide();'.PHP_EOL;
						echo '$("#lTable").hide();'.PHP_EOL;
					}
				?>
			});

		</script>
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
	
	</script>
	</head>
	<body>
	<div id="perspective" class="perspective effect-airbnb">
			<div class="container">
				<div class="wrapper">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.html"  class="logo"></a>
						<nav>
							<a href="#back" id="showMenu">Menu</a>
						</nav>
					</header>

				

			<!-- Main -->
					<div id="main" class="alt">

				<!-- One -->
					<section id="one">
						<div class="inner">

							<header class="major">
								<h1>Lost and Found</h1><hr style="width: 30% ;position: relative; top:-35px ;">
							
							</header>	
							<span id="info" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;"></span>
                            <section id="lostForm">

								<form action="" method="POST" id="form1">
								 <div class="row" style="margin:auto;  ;margin-top:5vh; ">
							
								<div class="col-sm-5" style="margin-left: 4.5vw;">
								<label for="name" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;">Lost  Something :</label>
								<input type="text" name="lName" id="name" placeholder="ObjectName">
								</div>

								<div class=" col-sm-5" style="margin-left: 4vw ;">
								<label for="name" style="font-size: 3.5vh;font-family: 'Roboto', sans-serif;font-weight: 500;">Your contact: &nbsp</label>
								<input type="text" name="lContact" id="name" placeholder="Number">
								</div>

								<div class=col-sm-2 style="margin-top: 9vh ;margin-left:5vw ;border-radius: 5% ;">
								
								<button type="submit" form="form1"  class="button special" value="Submit">Submit!</button>
								</div>
							
							</div>
								</form>


							<hr width="100% ;">
							</section>

                            <section id="foundForm">

								<form action="" method="POST" id="form2">
								 <div class="row" style="margin:auto;  ;margin-top:5vh; ">

								<div class="col-sm-2" style="margin-left: 4vw;border-bottom: 2vw ;">
								<label for="name" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;">Found Something :</label>
								<input type="text" name="fName" id="name" placeholder="ObjectName">
								</div>
                                         
									<div class="col-sm-2" style="margin-left: 3vw;">
								<label for="name" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;">Place:</label>
								<input type="text" name="fPlace" id="name" placeholder="Where??">
								</div>



								<div class=" col-sm-3" style="margin-left:4vw;">
								<label for="name" style="font-size: 3.5vh;font-family: 'Roboto', sans-serif;font-weight: 500;">Your contact: &nbsp</label>
								<input type="text" name="fContact" id="name" placeholder="Number">
								</div>

								<div class=col-sm-5	 style="margin-top: 9vh ;margin-left:3.5vw; ;border-radius: 5% ;">
								<button type="submit" form="form2"  class="button special" value="Submit">Submit!</button>
								
								</div>

							</div>


						<hr width="100% ;"></form>
						</section>
						<span id="info2" style="font-size: 3.5vh;  font-family: 'Roboto', sans-serif;font-weight: 500;"></span>
										<div class="table-wrapper" id="lTable">
									<table class="alt">
										<thead>
											<tr>
												<th>Sr.no</th>
												<th>Item</th>
												<th>Contact</th>
												<th>Place</th>
												
											
												
											</tr>
										</thead>
										<tbody>
										<?php
										if($flag!=2){

											foreach ($store as $key=>$value) {
												echo "<tr>";
												echo "<td>".$key."</td>";
												echo "<td>".$value['name']."</td>";
												echo "<td>".$value['contact']."</td>";
												echo "<td>".$value['place']."</td>";
												echo "</tr>";
											}
										}
										?>
											
										</tbody>
									
									</table>
								</div>

								</div>
							
							</div>

					</div>
						

					</div>
											

				
					</div>

				

			
			</div>

			                   
</div>
</div>     					
		<!-- Scripts -->
			<script src="assets/lost_found/js/jquery.min.js"></script>
			<script src="assets/lost_found/js/jquery.scrolly.min.js"></script>
			<script src="assets/lost_found/js/jquery.scrollex.min.js"></script>
			<script src="assets/lost_found/js/skel.min.js"></script>
			<script src="assets/lost_found/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/lost_found/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/lost_found/js/main.js"></script>
			<script src="assets/js/classie.js"></script>
			<script src="assets/js/menu.js"></script>
		</div></div>
		<?php require('render/menu.php');?>
		</div>
	</body>
</html>