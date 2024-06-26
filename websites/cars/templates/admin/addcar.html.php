
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


	if (isset($_POST['submit'])) {



		echo 'Car added';
	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Add Car</h2>

			<form action="addcar.php" method="POST" enctype="multipart/form-data">
				<label>Car Model</label>
				<input type="text" name="model" />

				<label>Car Engine Type</label>
				<input type="text" name="engineType" />
				
				<label>Car Mileage</label>
				<input type="text" name="mileage" />
				
				<label>Description</label>
				<textarea name="description"></textarea>

				<label>Price</label>
				<input type="text" name="price" />

				<label>Manufacturer</label>

				<select name="manufacturerId">
				<?php

					foreach ($manu as $manufacturer) {
						echo '<option value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';
					}

				?>

				</select>

				<label>Image</label>

				<input type="file" name="image[]" multiple="multiple"/>

				<input type="submit" name="submit" value="Add Car" />

			</form>
			

		
		<?php
		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">

				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}

	}
	?>

</section>
	</main>