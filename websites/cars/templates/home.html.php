<main class="home">
	<p>Welcome to Claire's Cars, Northampton's specialist in classic and import cars.</p>

	<ul class="cars">

	<?php

	foreach ($articles as $article) {

		echo '<li>';
		// for loop to pull through the images for the article
		for ($i = 0; file_exists('images/articles/' . $article['id'] . '_' . $i . '.jpg'); $i++) {?>
            <a href="/images/articles/<?=$article['id'] . '_' . $i?>.jpg"><img src="/images/articles/<?=$article['id'] . '_' . $i ?>.jpg" /></a>
          <?php 
        } 
		echo '<div class="details">';
			echo '<h2>' . $article['name'] . '</h2>';
		
			echo '<h4>' . $article['date'] . '</h4>';
			echo '<h4>' . $article['addedBy'] . '</h3>';
			echo '<p>' . $article['content'] . '</p>';

		echo '</div>';
		echo '</li>';
	}

	?>

	</ul>
	
	
	
	
	
</main>