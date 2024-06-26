<main class="admin">

	<section class="left">
		<ul>
<?php 	foreach ($manu as $manufacturers){
			echo '<li><a href="manufacturercars.php?manufacturer=' . $manufacturers['id'] . '">' . $manufacturers['name'] . '</a></li>';
		
	} 
			
?>
		</ul>
	</section>

	<section class="right">

<?php		foreach ($manuName as $manufacturerName){
			echo '<h1>'. $manufacturerName['name'] . ' Cars</h1><br/>';
			
			} 
 ?>

	<ul class="cars">


	<?php

	foreach ($cars as $car) {
		echo '<li>';
// loops through pulling all the images through to be displayed
		if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
			echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="images/cars/' . $car['id'] . '.jpg" /></a>';
		}

		echo '<div class="details">';
		foreach ($manuCars as $manufacturer){
				echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
		}	
		echo '<h3>£' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';

		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>
