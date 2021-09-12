<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Our Team</title>
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
								<h2>Meet the team</h2>
								<p>The most experienced real estate managers for the most professional real estate management - Diamond Real Estate. </p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<h3 class="major">Personal team pages</h3>
									<p>Meet our team of professionals that will assist you in making your dream of the perfect living space come true!</p>

									<p>Every day, our team prepares an inspirational quote for you. This is today's quote:</p>

									<blockquote>
										<?php
											$user = "diamond";
											$pass = "qDX7Fb3TvhVYgsSj";
											$db = new PDO('mysql:host=localhost;dbname=dre', $user, $pass );
											$sql = "SELECT file FROM quote;";
											$res = $db->query($sql);
											foreach($res as $row) {
												echo(file_get_contents($row['file']));
											}
										?>
									</blockquote>

									<section class="features">
										<article>
											<a href="#" class="image"><img src="images/team1.jpg" alt="" /></a>
											<h3 class="major">Yasmeen Pearce</h3>
											<p>Yasmeen Pearce is a dreamer who will help you make your dreams come true.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/team2.jpg" alt="" /></a>
											<h3 class="major">Jeffery White</h3>
											<p>Don't let Jeffery White's youth fool you - he has one of the keenest noses for perfect deals on today's real estate market!</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/team3.jpg" alt="" /></a>
											<h3 class="major">Theodore Lister</h3>
											<p>Theodore Lister - one of the most experienced realtors, and one of the friendliest, too!</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/team4.jpg" alt="" /></a>
											<h3 class="major">Lilah Fulton</h3>
											<p>Lilah Fulton is famous on the market for finding the most luxurious real estate - and then negotiating the best price for you!</p>
										</article>
									</section>

								</div>
							</div>

					</section>

				<!-- Footer -->
				<section id="footer">
					<div class="inner">
						<h2 class="major">Get in touch</h2>
						<p>Send us a message, and we will get in touch with you within 24 hours. Remember to first sign it using our signing service!</p>
						<form method="post" action="#">
							<div class="fields">
								<div class="field">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" />
								</div>
								<div class="field">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" />
								</div>
								<div class="field">
									<label for="message">Message</label>
									<textarea name="message" id="message" rows="4"></textarea>
								</div>
							</div>
							<ul class="actions">
								<li><input type="submit" value="Send Message" /></li>
							</ul>
						</form>
						<ul class="contact">
							<li class="icon solid fa-home">
								Diamond Real Estate GmbH<br />
								Wilhelminenhofstraße 45B<br />
								12459 Berlin
							</li>
							<li class="icon solid fa-phone">(000) 000-0000</li>
							<li class="icon solid fa-envelope"><a href="#">diamondrealestate@none.com</a></li>
							<li class="icon brands fa-twitter"><a href="#">twitter.com/diamondrealestate</a></li>
							<li class="icon brands fa-facebook-f"><a href="#">facebook.com/diamondrealestate</a></li>
							<li class="icon brands fa-instagram"><a href="#">instagram.com/diamondrealestate</a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Diamond Real Estate GmbH. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
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
