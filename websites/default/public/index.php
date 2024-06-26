<!DOCTYPE html>
<html>
	<head>
		<title>v.je server is running</title>
		<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="vje.css"/>
	</head>
	<body>

	<main>
		<article>
		<section>
		<div>
		<h2>v.je server is running</h2>

		<p>If you are seeing this page, you can now write files to the <code>websites/default/public</code> directory and they will be accessible.</p>
		</div>

	</section>
	<section>

		<div>
		<h2>Getting started</h2>
		<p>Try the following:</p>

		<ol>
			<li>Create a new file <code>websites/default/public/test.html</code></li>
			<li>Paste in the following code:

			<pre><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
	&lt;head&gt;
		&lt;title&gt;My Web Page&lt;/title&gt;
	&lt;/head&gt;
	&lt;body&gt;
		Hello World!
	&lt;/body&gt;
&lt;/html&gt;
</code>
			</pre></li>

			<li>Navigate to <a href="https://<?=
$_SERVER['HTTP_HOST']; ?>/test.html">https://<?= $_SERVER['HTTP_HOST'];
?>/test.html</a> and you should see your web page</li>


		</ol>
	</div>
</section>



<section>
<h2>Features</h2>
<ol>
    <li>All hosted websites use HTTPS with a <strong>valid SSL certificate</strong> from Let's Encrypt</li>
    <li>No configuration needed. Run <code class="inline">docker-compose up</code> and your website is hosted on <a href="https://v.je">https://v.je/</a></li>
    <li>Without configuration host different websites on v.je subdomains e.g. <a href="https://subdomain1.v.je">https://subdomain1.v.je/</a> and  <a href="https://subdomain2.v.je">https://subdomain2.v.je/</a></li>
    <li>Includes up to date PHP development software*:
        <ul>
            <li>PHP</li>
            <li>NGINX</li>
            <li>MariaDB</li>
            <li>Composer</li>
            <li>PHPUnit</li>
        </ul>
    </li>
    <li>Portability: You can run <code class="inline">docker-compose stop</code> on one machine, copy the folder, then <code class="inline">docker-compose up</code> on another and your website will be visible. The database is automatically imported and exported. Most environments store the database inside a local volume. If you move your files to a different PC the database is lost. That's not the case with this environment.</li>
    <li>URL rewriting is already set up. A request to any file that does not exist is sent to index.php</li>
</ol>

</section>

<section>
    <h2>MySQL</h2>

    <p>Connect to MySQL from your desktop using:</p>

    <ul>
        <li>Host: <strong>v.je</strong></li>
        <li>Port: <strong>3306</strong></li>
        <li>Username: <strong>v.je</strong></li>
        <li>Password: <strong>v.je</strong></li>
    </ul>
    
    <p>To connect to the server from PHP you must use <strong>mysql</strong> as the host. For example: </p>
    
    <code>
&lt;?php
$pdo = new PDO('mysql:dbname=test;host=mysql', 'v.je', 'v.je');
</code>

    <p>This MySQL user has full access to create schemas and other users. I suggest using MySQL Workbench but you can install the clunky PHPMyAdmin tool if you want a worse experience.</p>
</section>

<section>
    <h2>Starting and stopping the server</h2>

    <p>To start the server, run the command <code class="inline">docker-compose up -d</code> from the project's directory.</p>
    <p>To stop the server, run the command <code class="inline">docker-compose down</code> from the project's directory</p>
</section>


<section>
    <h2>Hosting multiple websites</h2>

    <p>The environment is configured to host multiple websites from different folders within the created <code class="inline">websites</code> directory. To create a new website which is available on <a href="https://mysite.v.je">https://mysite.v.je/</a>:</p>

    <ol>
        <li>Create the directory <code class="inline">mysite</code> inside the <code class="inline">websites</code> directory.</li>
        <li>Create the directory <code class="inline">public</code> inside the <code class="inline">mysite</code> directory.</li>
        <li>Place your web-accessible files inside the <code class="inline">websites/mysite/public</code> directory. For example, the file in <code class="inline">websites/mysite/public/phpinfo.php</code> will be accessible on the URL <a href="https://mysite.v.je">https://mysite.v.je/phpinfo.php</a></li>
    </ol>

    <p>Any directory you create inside the <code class="inline">websites</code> directory is treated as a subdomain of <code class="inline">v.je</code></p>
</section>

<section id="import">
    <h2>Easily import databases</h2>

    <p>You can import an SQL database automatically while the server is running. Create the file <code class="inline">websites/import.sql</code>, the SQL script inside the file will be executed and the import.sql file deleted.</p>
</section>

<section>
    <h2>PHPUnit</h2>

    <p>To run PHPUnit tests you can use the command:</p>
    
    <code>
docker-compose run phpunit
    </code>
    
    <p>This will run PHPUnit from the context of the <code class="inline">websites/default</code> directory and look for <code class="inline">phpunit.xml</code> at the path <code class="inline">websites/default/phpunit.xml</code>. If you wish to run unit tests for another directory you can specify it as a command line argument. For example to run php unit tests from the <code class="inline">websites/subdomain</code> directory you can run the command </p>
    
        <code>
docker-compose run phpunit /websites/subdomain
    </code>
</section>


<section>
    <h2>Composer</h2>
    <p>Composer is included and like PHPUnit defaults to the <code class="inline">websites/default</code> directory. Running the following command:</p>
    
    <code>
docker-compose run composer require level-2/dice
</code>

<p>Will create a vendor directory and install <a href="https://r.je/dice">Dice Dependency Injection Container</a> in <code class="inline">websites/default/vendor</code>. To specify a different folder, pass the directory to the command using the <code class="inline">-d</code> switch:</p>

    <code>
docker-compose run composer require level-2/dice -d /websites/subdomain
</code>

</section>
</article>
	</main>
</body>
</html>
