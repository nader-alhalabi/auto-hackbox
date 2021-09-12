<?php
	echo '<html>';
	echo '<div class="menu">';
		include("menu.php");
	echo '</div>';

	echo '</br>';
	echo '<h1> Welcome to my Garden Shop </h1>';
	echo '<p class="p_index"> I am currently running this website to promote my wonderfull garden flowers.
			You can have a look at them viewing the Products page.
			If you have any questions please ask me. 
			On the bottom of the page you find the Show Contact button, but please be nice...</p>';
	echo '<img src="garden_index.jpg" alt="Garden" style="width:500px;height:100px;">';
	echo '<body>
		<a href="index.php?page=contact.php"><button>Show Contact</button></a>
		</body>
		</html>
		';
	echo '</br>';
	$page = $_GET['page'];
	include($page);
	echo '</br>';

	echo '<div class=footer>';
		include("footer.php");
	echo '</div>';
?>



