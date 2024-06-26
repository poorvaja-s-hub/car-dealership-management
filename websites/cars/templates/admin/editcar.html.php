
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


	if (isset($_POST['submit'])) {
		if ($_FILES['image']['error'] == 0) {
			$fileName = $pdo->lastInsertId() . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../productimages/' . $fileName);
		}

		echo 'Product saved';
	}

	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			foreach ($cars as $car){

		?>

			<h2>Edit Car</h2>

			<form action="editcar.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?php echo $car['id']; ?>" />
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $car['name']; ?>" />

				<label>Description</label>
				<textarea name="description"><?php echo $car['description']; ?></textarea>

				<label>Current Price</label>
				<input type="text" name="price" value="<?php echo $car['price']; ?>" />

				<label>Old Price</label>
				<input type="text" name="oldPrice" value="" />

				
				<label>Category</label>

				<select name="manufacturerId">
				<?php
			}

					foreach ($manu as $manufacturer) {
						if ($car['categoryId'] == $manufacturer['id']) {
							echo '<option selected="selected" value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';
						}
						else {
							echo '<option value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';	
						}
						
					}

				?>

				</select>

				<label>Product image</label>

				<input type="file" name="image[]" multiple="multiple" />

				<input type="submit" name="submit" value="Save Product" />

			</form>

		<?php
		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Username</label>
				<input type="text" name="username" />

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