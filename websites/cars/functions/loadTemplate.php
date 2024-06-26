<?php


// load template to call the file template 
function loadTemplate($fileName, $templateVars) {
	extract($templateVars);
	ob_start();
	require $fileName;
	$contents = ob_get_clean();
	return $contents;
}

// functions to set the different opening times
function OpeningWinterTimes (){
	echo '<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p> ';
			
}

function OpeningSummerTimes (){
	echo '<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p> ';
			
}
