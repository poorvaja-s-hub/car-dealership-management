<?php
// class to control the admin manufacturer functionality on the site
class AdminManufacturerController {
	// declares the variables that will be used in the class
	private $carsTable;
	private $manufacturerTable;
	private $adminTable;
	
	// constructor that will be used to set the variables these are database tables that are used by the functions
	public function __construct($carTable, $manufacturerTable, $adminTable){
		$this->carsTable = $carTable;
		$this->manufacturerTable = $manufacturerTable;
		$this->adminTable = $adminTable;
	}
	
	// the fucntions will be called by the index page. These will pass the content to the layout page in order to dxisplay it. 
	
	public function AdminManufacturers(){
		$categories = $this->manufacturerTable->findAll();
		
		return [
				'template' => 'admin/manufacturers.html.php',
				'title' => 'Claires\'s Cars - Admin Manufacturer',
				'variables' => [
								'categories' => $categories
								]
		];
	}
	
	public function AdminAddManufacturers(){
		
		// checks that the $_POST submit has been set.
		if (isset($_POST['submit'])) {
			$this->manufacturerTable->addManufacturer($_POST);
		}
		return [
				'template' => 'admin/addmanufacturer.html.php',
				'title' => 'Claires\'s Cars - Admin Manufacturer',
				'variables' => []
				];
	}
	
	public function AdminEditManufacturer(){
		if (isset($_POST['submit'])) {
			$this->manufacturerTable->updateManufacturer();
			
			// this header links the page back to thne URL entered.
			header('location: /admin/manufacturers.php');
		}
		$currentManu = $this->manufacturerTable->findWhere('id', $_GET['id']);
		
		return [
				'template' => 'admin/editmanufacturer.html.php',
				'title' =>'Claires\'s Cars - Admin Manufacturer',
				'variables' => [
								'currentManu' => $currentManu
								]
				];
	}
	
	public function AdminDeleteManufacturer(){
		$this->manufacturerTable->deleteWhere('id');
		
		return [
			'template' => 'admin/deletemanufacturer.html.php',
			'title' => 'Claires\'s Cars - Admin Manufacturer',
			'variables' => []
		];
	}
	
}