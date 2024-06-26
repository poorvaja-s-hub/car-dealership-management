
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

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			if (isset($_POST['submit'])){
				echo '<h2> Article created </h2>';
			}
			else if (isset($_POST['delete'])){
				echo '<h2> Article deleted </h2>';
			}
			else {
		?>


			<h2>Create Article</h2>

			<form action="articles.php" method="post" enctype="multipart/form-data">
				<label>Name</label>
				<input type="text" name="name" />

				<label>Date</label>
				<input type="Date" name="date" />
				
				
				<label>Content</label>
				<textarea name="content"></textarea>
				
				<label>Image</label>
				
				<input type="file" name="image[]" multiple="multiple"/>

				<input type="submit" name="submit" value="submit" />
			</form></br>
			
			
			
			<form action="articles.php" method="post">
				<label><h2>Delete Article</h2></label></br>
				<label>Name</label>
				<input type="text" name="name" />

				<label>Date</label>
				<input type="Date" name="date" />

				<input type="submit" name="delete" value="delete" />
			</form>

			<?php
			}
		}

		else {
			?>
			<h2>Log in</h2>

			<form action="admin.php" method="post">
				<label>Username</label>
				<input type="text" name="username" />
				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}
	?>

</section>
	</main>