	<main class="admin">

	<section class="left">
		<ul>
<?php 	foreach ($manu as $manufacturer){
			echo '<li><a href="manufacturercars.php?manufacturer=' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</a></li>';
		
	} 
			
?>
		</ul>
	</section>

	<section class="right">

		<h1>Our cars</h1>

	<ul class="cars">

	<?php

	foreach ($cars as $car) {

		echo '<li>';

		 for ($i = 0; file_exists('images/cars/' . $car['id'] . '_' . $i . '.jpg'); $i++) {?>
            <a href="/images/cars/<?=$car['id'] . '_' . $i?>.jpg"><img src="/images/cars/<?=$car['id'] . '_' . $i ?>.jpg" /></a>
          <?php 
        } 

		echo '<div class="details">';
				foreach ($manu as $manufacturer) {
			if ($car['manufacturerId'] == $manufacturer['id']) {
				echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
			}
		}
		
		echo '<h4>' . $car['oldPrice'] . '</h4>';
		echo '<h3>Now £' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';

		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>