<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Management console</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">Diamond Real Estate</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
				<nav id="menu">
					<div class="inner">
						<h2>Menu</h2>
						<ul class="links">
							<li><a href="index.php">Home</a></li>
							<li><a href="estates.php">Available estates</a></li>
							<li><a href="sign.php">Sign your request</a></li>
							<li><a href="team.php">Meet the team</a></li>
							<li><a href="login.php">Log In</a></li>
						</ul>
						<a href="#" class="close">Close</a>
					</div>
				</nav>

				<!-- Wrapper -->
				<section id="wrapper">
					<header>
						<div class="inner">
							<h2>Welcome, team!</h2>
							<p>Let's put on a smile for our customers!</p>
						</div>
					</header>

					<!-- Content -->
						<div class="wrapper">
							<div class="inner">

								<h3 class="major">Quote selection</h3>
								<p>In order to ensure that accidents such as last November don't happen again, the editable quote field has been replaced by a list of management-approved, appropriate quotes. If you are on quote duty, please remember to select a new inspirational quote for our customers every morning!</p>
									<?php
									if(isset($_GET["quote"])) {
										$user = "diamond";
										$pass = "qDX7Fb3TvhVYgsSj";
										$db = new PDO('mysql:host=localhost;dbname=dre', $user, $pass );
										$sql = "DELETE FROM quote;";
										$db->exec($sql);
										$sql = "INSERT INTO quote VALUES('" . $_GET["quote"] . "');";
										$db->exec($sql);
										echo "<p style=\"color:#00ff00;\">Quote was successfully set</p>";
									}
									?>
									<form method="get" action="dre_managementconsole.php">
										<div class="fields">
											<div class="field">
												<label for="quote">Today's quote</label>
												<select id="quote" name="quote">
													<option value="williamjames.txt">Act as if what you do makes a difference. It does. </option>
													<option value="churchill.txt">Success is not final, failure is not fatal: it is the courage to continue that counts.</option>
													<option value="keller.txt">Never bend your head. Always hold it high. Look the world straight in the eye. </option>
													<option value="zig.txt">What you get by achieving your goals is not as important as what you become by achieving your goals.</option>
													<option value="teddy.txt">Believe you can and you're halfway there. </option>
													<option value="burnett.txt">When you have a dream, you've got to grab it and never let go. </option>
													<option value="dean.txt">I can't change the direction of the wind, but I can adjust my sails to always reach my destination. </option>
													<option value="lovato.txt">No matter what you're going through, there's a light at the end of the tunnel. </option>
												</select>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Set quote" /></li>
										</ul>
									</form>


									<h3 class="major">Leads</h3>
									<p>Please follow up on "follow now" leads first, then "hot". "Cold" leads should be sold to our partners as soon as possible - and remember, always sell the lead as "hot, but we don't have the time to follow up", never as "cold"!</p>
										<?php
										if(isset($_GET["state"])) {
											$user = "diamond";
											$pass = "qDX7Fb3TvhVYgsSj";
											$db = new PDO('mysql:host=localhost;dbname=dre', $user, $pass );
											$sql = "SELECT * FROM customers WHERE state='" . $_GET["state"] . "'";
											$res = $db->query($sql);
											echo "<table><tr><th>Name</th><th>Address</th></tr>";
											foreach($res as $row) {
												echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";
											}
											echo "</table>";
										}
										?>
										<form method="get" action="dre_managementconsole.php">
											<div class="fields">
												<div class="field">
													<label for="state">Select lead state</label>
													<select id="state" name="state">
														<option value="follow now">Follow now - contact asap!</option>
														<option value="hot">Hot - keep pushing!</option>
														<option value="cold">Cold - sell to highest-bidding partner!</option>
													</select>
												</div>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Get leads" /></li>
											</ul>
										</form>

								</div>
							</div>


					</section>


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
