<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/admin/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/admin/css/main.css" />

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/admin/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/admin/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
											<div class="6u$ 12u$(medium)">
												<!-- Form -->
													<div style="margin-left:-2.75vw; margin-right:0; width : 96vw; margin-bottom:2em;margin-top:-2em;border-bottom: solid 0.5vh #847171;">
													<h3 style="padding-top : 0;">New Course</h3>
													</div>

													<form class="form-horizontal">
													    <div class="form-group">
													      <label class="control-label col-sm-2" for="email">Course Name:</label>
													      <div class="col-sm-10">
													        <input type="email" class="form-control" id="email" placeholder="Enter email">
													      </div>
													    </div>
													    <div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="pwd">Description:</label>
													      <div class="col-sm-10">
																	<textarea class="form-control" rows="5" id="comment"></textarea>
																 </div>
													    </div>

															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="pwd">Timings:</label>
													    </div>

															<table class="table table-hover">
													    <thead>
													      <tr style="text-align:center">
													        <th style="text-align:center">Day</th>
													        <th style="text-align:center">From</th>
													        <th style="text-align:center">To</th>
													      </tr>
													    </thead>
													    <tbody>
													      <tr>
													        <td>Monday</td>
													        <td>
																		<div class="form-group">
																	  <select class="form-control" id="sel1">
																	    <option>9am</option>
																	    <option>10am</option>
																	    <option>11am</option>
																	    <option>12pm</option>
																			<option>2pm</option>
																			<option>5pm</option>
																	  </select>
																	</div>
																	</td>
													        <td>
																		<div class="form-group">
																	  <select class="form-control" id="sel1">
																			<option>9am</option>
																	    <option>10am</option>
																	    <option>11am</option>
																	    <option>12pm</option>
																			<option>2pm</option>
																			<option>5pm</option>
																	  </select>
																	</div>
																	</td>
													      </tr>
													      <tr>
													        <td>Tuesday</td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													      </tr>
													      <tr>
																	<td>Wednesday</td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													      </tr>
																<tr>
													        <td>Thursday</td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													      </tr>
																<tr>
													        <td>Friday</td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													        <td><div class="form-group">
																	<select class="form-control" id="sel1">
																		<option>9am</option>
																		<option>10am</option>
																		<option>11am</option>
																		<option>12pm</option>
																		<option>2pm</option>
																		<option>5pm</option>
																	</select>
																</div></td>
													      </tr>
													    </tbody>
													  </table>

													    <div class="form-group">
													      <div class="col-sm-offset-2 col-sm-10">
													        <input type="submit" class="button special" value="Submit" />
													      </div>
													    </div>
													  </form>

														<div style="margin-left:-2.75vw; margin-right:0; width : 96vw; margin-bottom:2em;margin-top:-1em;border-bottom: solid 0.5vh #847171;border-top: solid 0.5vh #847171;">
														<h3 style="padding-bottom:0px;margin-top:auto;margin-bottom:auto">Assign Role</h3>
														</div>

														<form class="form-horizontal">
															<div class="form-group">
													      <label class="control-label col-sm-2" for="email">User:</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="email" placeholder="Enter user">
													      </div>
													    </div>

															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="email">Admin Of:</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="email" placeholder="Admin of">
													      </div>
													    </div>

															<div class="form-group" style="margin-top:2em">
													      <div class="col-sm-offset-2 col-sm-10">
													        <input type="submit" class="button special" value="Submit" />
													      </div>
													    </div>
														</form>

														<div style="margin-left:-2.75vw; margin-right:0; width : 96vw; margin-bottom:2em;margin-top:-1em;border-bottom: solid 0.5vh #847171;border-top: solid 0.5vh #847171;">
														<h3 style="padding-bottom:0px;margin-top:auto;margin-bottom:auto">Send Global Notification</h3>
														</div>

														<form class="form-horizontal">
															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="pwd">Notification:</label>
													      <div class="col-sm-10">
																	<textarea class="form-control" rows="5" id="comment"></textarea>
																 </div>
													    </div>
														</form>

														<div class="form-group" style="margin-top:2em">
															<div class="col-sm-offset-2 col-sm-10">
																<input type="submit" class="button special" value="Submit" />
															</div>
														</div>

														<div style="margin-left:-2.75vw; margin-right:0; width : 96vw; margin-bottom:2em;margin-top:1em;border-bottom: solid 0.5vh #847171;border-top: solid 0.5vh #847171;">
														<h3 style="padding-bottom:0px;margin-top:auto;margin-bottom:auto">Hide Post</h3>
														</div>

														<form class="form-horizontal">
															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="email">Post ID:</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="email" placeholder="ID">
													      </div>
													    </div>
														</form>

														<div class="form-group" style="margin-top:2em">
															<div class="col-sm-offset-2 col-sm-10">
																<input type="submit" class="button special" value="Submit" />
															</div>
														</div>

														<div style="margin-left:-2.75vw; margin-right:0; width : 96vw; margin-bottom:2em;margin-top:1em;border-bottom: solid 0.5vh #847171;border-top: solid 0.5vh #847171;">
														<h3 style="padding-bottom:0px;margin-top:auto;margin-bottom:auto">Add Events</h3>
														</div>

														<form class="form-horizontal">
															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="email">Date:</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="date" placeholder="Date">
													      </div>
													    </div>

															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="email">Subject</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="subject" placeholder="Subject">
													      </div>
													    </div>
														</form>

														<div class="form-group" style="margin-top:2em">
															<div class="col-sm-offset-2 col-sm-10">
																<input type="submit" class="button special" value="Submit" />
															</div>
														</div>

														<div style="margin-left:-2.75vw; margin-right:0; width : 96vw; margin-bottom:2em;margin-top:1em;border-bottom: solid 0.5vh #847171;border-top: solid 0.5vh #847171;">
														<h3 style="padding-bottom:0px;margin-top:auto;margin-bottom:auto">Aprove Posts</h3>
														</div>

														<div style="margin-left:-2.75vw; margin-right:0; width : 96vw; margin-bottom:2em;margin-top:1em;border-bottom: solid 0.5vh #847171;border-top: solid 0.5vh #847171;">
														<h3 style="padding-bottom:0px;margin-top:auto;margin-bottom:auto">Create Article</h3>
														</div>

														<form class="form-horizontal">
															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="email">Title:</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="date" placeholder="Title">
													      </div>
													    </div>

															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="pwd">Summary:</label>
													      <div class="col-sm-10">
																	<textarea class="form-control" rows="5" id="comment"></textarea>
																 </div>
													    </div>

															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="email">Image URL:</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="subject" placeholder="URL">
													      </div>
													    </div>

															<div class="form-group" style="margin-top:2em">
													      <label class="control-label col-sm-2" for="email">Read more:</label>
													      <div class="col-sm-10">
													        <input type="text" class="form-control" id="subject" placeholder="Read more">
													      </div>
													    </div>
														</form>

														<div class="form-group" style="margin-top:2em">
															<div class="col-sm-offset-2 col-sm-10">
																<input type="submit" class="button special" value="Submit" />
															</div>
														</div>

											</div>
										</div>

								</div>
							</section>
			</div>

		<!-- Scripts -->
			<script src="assets/admin/js/jquery.min.js"></script>
			<script src="assets/admin/js/jquery.scrolly.min.js"></script>
			<script src="assets/admin/js/jquery.scrollex.min.js"></script>
			<script src="assets/admin/js/skel.min.js"></script>
			<script src="assets/admin/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/admin/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/admin/js/main.js"></script>

	</body>
</html>
