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

	<section class="right">
<?php 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			?>
					<h2> Admin Account Deleted</h2>
			<?php
	
		
	}
?>

	</section>
	</main>