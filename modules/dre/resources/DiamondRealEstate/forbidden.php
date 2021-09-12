<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Access denied!</title>
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
							<h2>Restricted area</h2>
							<p style="color:#ff0000; weight:bold">You have entered the wrong password!</p>
						</div>
					</header>

					<!-- Content -->
						<div class="wrapper">
							<div class="inner">

								<h3 class="major" style="color:#ff0000; weight:bold">Access denied</h3>
								<p>Please note that attempting to access this restricted area if you are not a member of the team is a crime!</p>

								<p id="error" style="color:#ff0000; weight:bold"></p>

					</section>


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

			<script>
			function validateLoginInput() {
				if($("#password").val() == "FAskljhfh8923kjn!") {
					window.location.href = "dre_managementconsole.php";
				}
				else {
					window.location.href = "forbidden.php";
				}
				return false;
			}
			</script>
	</body>
</html>
