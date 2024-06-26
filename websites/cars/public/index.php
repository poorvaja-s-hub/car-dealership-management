<?php
// requires will pull through all the aditional needed files like the load template and the controllers which are called.
session_start();
require '../functions/loadTemplate.php';
require '../database.php';
require '../classes/DatabaseTable.php';
require '../Controllers/MainController.php';
require '../Controllers/CarController.php';
require '../Controllers/ManufacturerController.php';
require '../Controllers/AdminController.php';
require '../Controllers/AdminManufacturerController.php';

// set variables to store an instance of the database table this will help run queries to the database.
$carsTable = new DatabaseTable($pdo, 'cars', 'id');
$manufacturerTable = new DatabaseTable($pdo, 'manufacturers', 'id');
$adminTable = new DatabaseTable($pdo, 'users', 'id');
$enquiriesTable = new DatabaseTable($pdo, 'enquiries', 'id');
$articlesTable = new DatabaseTable($pdo, 'articles', 'id');
// set variables with all the controllers in order for their functions to be called.
$mainController = new MainController($enquiriesTable, $articlesTable);
$carController = new CarController($carsTable, $manufacturerTable);
$manufacturerController = new ManufacturerController($carsTable, $manufacturerTable);
$adminController = new AdminController($carsTable, $manufacturerTable, $adminTable, $enquiriesTable, $articlesTable);
$adminManufacturerController = new AdminManufacturerController($carsTable, $manufacturerTable, $adminTable);
// route variable which has shortened the url this is for the if statement condition
$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');

// if statement to find out which page has been called and what functions to call for that page.
if ($route == ''){
	$page = $mainController->home();
}
else if($route == 'cars.php'){
	$page = $carController->cars();
}
else if($route == 'manufacturercars.php'){
	$page = $manufacturerController->ManufacturerCars();	
}
else if($route == 'about.php'){
	$page = $mainController->about();
}
else if($route == 'contact.php'){
	$page = $mainController->contact();
}
else if($route == 'enquiries.php'){
	$page = $mainController->enquiries();
}
else if($route == 'careers.php'){
	$page = $mainController->careers();
}
else if($route == 'admin/'){
	$page = $adminController->AdminHome();
}
else if($route == 'admin/adminhome.php'){
	$page = $adminController->AdminHome();
}
else if ($route == 'admin/cars.php'){
	$page = $adminController->AdminCars();
}
else if ($route == 'admin/editcar.php'){
	$page = $adminController->AdminEditCar();
}
else if ($route == 'admin/deletecar.php'){
	$page = $adminController->AdminDeleteCar();
}
else if ($route == 'admin/addcar.php'){
	$page = $adminController->AdminAddCar();
}
else if ($route == 'admin/manufacturers.php'){
	$page = $adminManufacturerController->AdminManufacturers();
}
else if ($route == 'admin/addmanufacturer.php'){
	$page = $adminManufacturerController->AdminAddManufacturers();
}
else if ($route == 'admin/editmanufacturer.php'){
	$page = $adminManufacturerController->AdminEditManufacturer();
}
else if ($route == 'admin/deletemanufacturer.php'){
	$page = $adminManufacturerController->AdminDeleteManufacturer();
}
else if ($route == 'admin/adminlogout.php'){
	$page = $adminController->AdminLogOut();
}
else if ($route == 'admin/archivecar.php'){
	$page = $adminController->AdminArchiveCar();
}
else if ($route == 'admin/archived.php'){
	$page = $adminController->AdminArchivedCars();
}
else if ($route == 'admin/removerestorecar.php'){
	$page = $adminController->AdminRemoveRestoreCar();
}
else if ($route == 'admin/admins.php') {
	$page = $adminController->AdminUsers();
}
else if ($route == 'admin/adminsupdated.php'){
	$page = $adminController->AdminAddUser();
}
else if ($route == 'admin/adminsdeleted.php'){
	$page = $adminController->AdminDeleteUser();
}
else if ($route == 'admin/enquiries.php'){
	$page = $adminController->AdminEnquiries();
}
else if ($route == 'admin/articles.php'){
	$page = $adminController->AdminArticles();
}

// output variable which will load the template file that is then passed to the layout page.
$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
// this sets the title for the page.
$title = $page['title']; 
// calls the main layout file
require  '../templates/layout.html.php';

