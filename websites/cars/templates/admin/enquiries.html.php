
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


			<h2>Enquiries</h2>


			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th style="width: 10%">Custoner Name</th>';
			echo '<th style="width: 10%">Phone Number</th>';
			echo '<th style="width: 10%">Email</th><br>';
			echo '<th style="width: 20%">Enquiry</th>';
			echo '<th style="width: 5%">Complete</th>';
			echo '</tr>';

			foreach ($enquiries as $enquiry) {
				echo '<tr>';
				echo '<td>' . $enquiry['customerName'] . '</td>';
				echo '<td>' . $enquiry['phoneNumber'] . '</td>';
				echo '<td>' . $enquiry['email'] . '</td>';
				echo '<td>' . $enquiry['enquiry'] . '</td>';
				echo '<td> <form method="post" action="enquiries.php">
				<input type="hidden" name="id" value="' . $enquiry['id'] . '" />
				<input type="submit" name="status" value="Complete" />
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