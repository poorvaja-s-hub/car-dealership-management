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

		if(isset($_SESSION['master']) && $_SESSION['master'] == 'Y') {
			?>
					<h2>Add Admin Account</h2>

		<form action="adminsupdated.php" method="post" style="padding: 40px">
			<label>Enter Username</label>
			<input type="text" name="username" />
			<label>Enter First Name</label>
			<input type="test" name="firstName" />
			<label>Password</label>
			<input type="password" name="password" />
			<label>Master Account</label><br>
			<input type="text" name="master" value="N" />
			<input type="submit" name="submit" value="Log In" />
		</form><br>
		
			
		<form action="adminsdeleted.php" method="post" style="padding: 40px">
			<label>Enter Username</label>
			<input type="text" name="username" />

			<input type="submit" name="delete" value="Delete" />
		</form>
			<?php
		}
		else{
			?>
				<h3>You need to have Master rights to use this area.</h3>
			
			<?php
		}
		
	}
?>

	</section>
	</main>