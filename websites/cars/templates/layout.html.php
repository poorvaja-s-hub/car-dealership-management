<? require '../functions/loadTemplate.php' ;
session_start();
// layout page to set the standard look of the website this will be ran on every page and the main section will change to display different data.
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?=$title?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<?=OpeningWinterTimes();?>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/cars.php">Showroom</a></li>
			<li><a href="/about.php">About Us</a></li>
			<li><a href="/contact.php">Contact us</a></li>
			<li><a href="/admin/">Admin</a></li>
			<li><a href="/careers.php">Careers</a></li>
		</ul>

	</nav>
<img src="images/randombanner.php"/>
		<?=$output?> 


	<footer>
		&copy; Claire's Cars 2024
	</footer>
</body>
</html>
