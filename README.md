# Car Dealership Management System

A comprehensive Car Dealership Management System built with PHP and MySQL. This web application allows users to manage car manufacturers and their cars, providing CRUD (Create, Read, Update, Delete) functionality. It also includes an admin panel for managing the entire system. The project is designed to help car dealerships efficiently manage their inventory and streamline operations.

## Features

- **Manufacturers Management:** Add, view, update, and delete car manufacturers.
- **Cars Management:** Add, view, update, and delete cars.
- **Admin Panel:** Comprehensive admin panel for managing the entire system.
- **User Authentication:** Secure login for admin users.
- **Responsive Design:** Mobile-friendly design for seamless access across devices.

## Technologies Used

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Frameworks/Libraries:** Bootstrap (for responsive design)

## Installation

### Prerequisites

- PHP 7.x or higher
- MySQL 5.x or higher
- Apache server (or any compatible web server)
- Composer (for dependency management)

### Features
1. All hosted websites use HTTPS with a valid SSL certificate from Let's Encrypt
2. No configuration needed. Run docker-compose up and your website is hosted on https://v.je/
3. Without configuration host different websites on v.je subdomains e.g. https://subdomain1.v.je/ and https://subdomain2.v.je/
4. Therefore, this website can be viewed at https://cars.v.je
5. Includes up to date PHP development software:
  - PHP
  - NGINX
  - MariaDB
  - Composer
  - PHPUnit
  
Portability: You can run docker-compose stop on one machine, copy the folder, then docker-compose up on another and your website will be visible. The database is automatically imported and exported. Most environments store the database inside a local volume. If you move your files to a different PC the database is lost. That's not the case with this environment.
URL rewriting is already set up. A request to any file that does not exist is sent to index.php

### MySQL
Connect to MySQL from your desktop using:
- **Host:** v.je
- **Port:** 3306
- **Username:** v.je
- **Password:** v.je
To connect to the server from PHP you must use mysql as the host.
```bash
<?php
$pdo = new PDO('mysql:dbname=test;host=mysql', 'v.je', 'v.je');
```

### Screenshots
<img width="1133" alt="Screenshot 2024-06-26 at 17 40 00" src="https://github.com/poorvaja-s-hub/car-dealership-management/assets/173160776/3092da72-d23d-4f1b-a8bf-90c3adf0e4aa">

<img width="1120" alt="Screenshot 2024-06-26 at 17 40 21" src="https://github.com/poorvaja-s-hub/car-dealership-management/assets/173160776/b9d5ae61-1cdf-447b-88e9-282575ab6d4d">

<img width="1121" alt="Screenshot 2024-06-26 at 17 40 31" src="https://github.com/poorvaja-s-hub/car-dealership-management/assets/173160776/f70e33bc-0073-4a4f-8e26-0349eafc2f7a">

<img width="1090" alt="Screenshot 2024-06-26 at 17 40 51" src="https://github.com/poorvaja-s-hub/car-dealership-management/assets/173160776/e9475618-dfcf-4ea7-96fc-783360f2309d">



