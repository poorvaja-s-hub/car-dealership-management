
	<main class="admin">
				<section class="left">
		<ul>
			<li><a href="manufacturers.php">Manufacturers</a></li>
			<li><a href="cars.php">Cars</a></li>
			<li><a href="archived.php">Archived Cars</a></li>
			<li><a href="admins.php"> Admins</a></li>
			<li><a href="enquiries.php"> Enquiries</a></li>
			<li><a href="articles.php"> Create Article</a></li>
			<li><a href="adminlogout.php"> Log Out</a></li>
		</ul>
	</section>
	<?php	
	// destroys the session variable
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		session_destroy();

	?>

	<section class="right">
	<h2>You are now logged out</h2>
	</section>
	<?php
	}
	else {
		?>
		<h2>Log in</h2>

		<form action="adminhome.php" method="post" style="padding: 40px">
			<label>Enter Username</label>
			<input type="text" name="username" />
			<label>Enter Password</label>
			<input type="password" name="password" />

			<input type="submit" name="submit" value="Log In" />
		</form>
	<?php
	}
	?>


	</main>