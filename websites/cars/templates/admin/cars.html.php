
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
		?>


			<h2>Cars</h2>

			<a class="new" href="addcar.php">Add new car</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th style="width: 10%">Model</th>';
			echo '<th style="width: 10%">Price</th>';
			echo '<th style="width: 10%">Engine Type</th>';
			echo '<th style="width: 10%">Mileage</th>';
			echo '<th style="width: 10%">Added By</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			foreach ($cars as $car) {
				echo '<tr>';
				echo '<td>' . $car['name'] . '</td>';
				echo '<td>£' . $car['price'] . '</td>';
				echo '<td>' . $car['engineType'] . '</td>';
				echo '<td>' . $car['mileage'] . '</td>';
				echo '<td>' . $car['addedBy'] . '</td>';
				echo '<td><a style="float: right" href="editcar.php?id=' . $car['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="archivecar.php">
				<input type="hidden" name="id" value="' . $car['id'] . '" />
				<input type="submit" name="submit" value="Archive" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

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