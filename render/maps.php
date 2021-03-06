<?php 
require_once('servConf.php');
$list="";
$sql = "SELECT `pName`,`pX`,`pY` FROM `around` ";
// global $conn;
$result = mysqli_query(mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE), $sql);
if($result && mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		$list.= "<option pxcoord='".$row['pX']."' pycoord='".$row['pY']."' style='background-color: #2a2f4a ;'>".$row['pName']."</option>";
		
	}
}
		
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Getting around campus</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/timetable/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="assets/js/modernizr.custom.25376.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="assets/js/fortyNav.js"></script>
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
		
	$.post("",
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
      function callme() {
        var bounds = new google.maps.LatLngBounds;
        var markersArray = [];

        var origin1 = {lat: 55.93, lng: -3.118};
        var destinationA = {lat: 50.087, lng: 14.421};

        var destinationIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=D|FF0000|000000';
        var originIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=O|FFFF00|000000';
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 55.53, lng: 9.4},
          zoom: 10
        });
        var geocoder = new google.maps.Geocoder;

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: [origin1],
          destinations: [destinationA],
          travelMode: 'BICYCLING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
          if (status !== 'OK') {
            alert('Error was: ' + status);
          } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
            deleteMarkers(markersArray);

            var showGeocodedAddressOnMap = function(asDestination) {
              var icon = asDestination ? destinationIcon : originIcon;
              return function(results, status) {
                if (status === 'OK') {
                  map.fitBounds(bounds.extend(results[0].geometry.location));
                  markersArray.push(new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: icon
                  }));
                } else {
                  alert('Geocode was not successful due to: ' + status);
                }
              };
            };

            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              geocoder.geocode({'address': originList[i]},
                  showGeocodedAddressOnMap(false));
              for (var j = 0; j < results.length; j++) {
                geocoder.geocode({'address': destinationList[j]},
                    showGeocodedAddressOnMap(true));
                outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                    ': ' + results[j].distance.text + ' in ' +
                    results[j].duration.text + '<br>';
              }
            }
          }
        });
      }

      function deleteMarkers(markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
          markersArray[i].setMap(null);
        }
        markersArray = [];
      }
    </script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDoS4zxUVccoOIkEZadbmTssHyiV__QXw&callback=initMap">
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
						<!-- https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=40.6655101,-73.89188969999998&destinations=40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626&key=AIzaSyCDoS4zxUVccoOIkEZadbmTssHyiV__QXw -->
							<a href="#back" id="showMenu" style="margin-left:30px ;">Menu :: iWebApp</a>
						</nav>
					</header>

				
				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">

									<header class="major">
										<h1>Maps</h1>
									</header>

									

									<h3>Take me:</h3>
                                                                 <div class="select-wrapper" >
																	<select name="demo-category" id="demo-category">
																		<option value="" style="background-color: #2a2f4a ;">- From -</option>
																		<?php echo $list;?>
																	</select>
																</div>
                                                                  

                                                                 <div class="select-wrapper-2 half ">
																	<select name="demo-category" id="demo-category">
																		<option value="" style="background-color: #2a2f4a ;">- To -</option>
																		<?php echo $list;?>
																	</select>
																</div>
											

											</div>
										
										</div>

								</div>
								<div id="output"></div>
							</section><br>
							<center><iframe

						  height="450"
						  frameborder="0" style="border:0;width:80%"
						  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCDoS4zxUVccoOIkEZadbmTssHyiV__QXw
						    &q=IIT+Patna+Bihta" allowfullscreen>
						</iframe></center>
					</div>

		
			</div>

		<!-- Scripts -->
			<script src="assets/timetable/js/jquery.min.js"></script>
			<script src="assets/timetable/js/jquery.scrolly.min.js"></script>
			<script src="assets/timetable/js/jquery.scrollex.min.js"></script>
			<script src="assets/timetable/js/skel.min.js"></script>
			<script src="assets/timetable/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/timetable/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/timetable/js/main.js"></script>
			<script src="assets/js/classie.js"></script>
			<script src="assets/js/menu.js"></script>
		</div></div>
		<?php require('render/menu.php');?>
		</div>
	</body>
</html>