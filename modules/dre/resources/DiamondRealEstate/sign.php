<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Signing service</title>
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
						<h1><a href="index.php">Diamond real estate</a></h1>
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
								<h2>Our promise to you</h2>
								<p>Others promise, we deliver.</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<section>
										<?php
										if(isset($_POST['message'])) {
											putenv("GNUPGHOME=/tmp");
											$res = gnupg_init();
											$PrivateData = file_get_contents('our_private_dre_key.key');
											$PrivateKey = gnupg_import($res, $PrivateData);
											gnupg_addsignkey($res, $PrivateKey['fingerprint']);
											$signed = gnupg_sign($res, $_POST['message']);
											echo "<h3 class=\"major\">This is your signed message: </h3><p>" . $signed . "</p>";
										}
										else {?>
											<h3 class="major">Sign your message</h3>
											<p>Thanks to our IT experts, we have adapted the new, cutting edge technology known as "PGP private key message signing" to your advantage! Any message you enter within the field below will have the current date and time appended. It will then be extended with a special machine-signature using our own private key to prove that you have created the message at the given time on our site.</p>
											<p>Send the message to us immediately. Should you not receive a response within 24 hours, we will give you 10% off our commission on your next purchase!</p>

											<form method="post" action="sign.php">
												<div class="fields">
													<div class="field">
														<label for="message">Message</label>
														<textarea name="message" id="message" rows="4"></textarea>
													</div>
												</div>
												<ul class="actions">
													<li><input type="submit" value="Sign Message" /></li>
												</ul>
											</form>

										<?php
										}
										?>

									</section>
								</div>
							</div>

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
