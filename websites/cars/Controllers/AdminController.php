<?php

// class to control the functionality of the admin side of the site.
class AdminController {
	// declares the private variables that are needed by this class
	private $carsTable;
	private $manufacturerTable;
	private $adminTable;
	private $enquiriesTable;
	private $articlesTable;
	
	public function __construct($carTable, $manufacturerTable, $adminTable, $enquiriesTable, $articlesTable){
		
	// sets the variables for the data base table that is used in the function.
	
		$this->carsTable = $carTable;
		$this->manufacturerTable = $manufacturerTable;
		$this->adminTable = $adminTable;
		$this->enquiriesTable = $enquiriesTable;
		$this->articlesTable = $articlesTable;
	}
	
	// Functions that are called by the index file these will run on their designated pages and return the main variables that display content on the page to the layout file
	public function AdminHome(){
		
		$admins = $this->adminTable->findAll();

			return [
				'template' => 'admin/adminhome.html.php',
				'title' => 'Claires\'s Cars - Admin Home',
				'variables' => [
								'admins' => $admins
								
								]
				];
	}
	public function AdminCars() {
		$cars = $this->carsTable->findWhere('archive', 'N');
		return [
				'template' => 'admin/cars.html.php',
				'title' => 'Claires\'s Cars - Admin Cars',
				'variables' => [
								'cars' => $cars
								]
				];
	}
	
	public function AdminArchivedCars() {
		$cars = $this->carsTable->findWhere('archive', 'Y');
		return [
				'template' => 'admin/archived.html.php',
				'title' => 'Claires\'s Cars - Admin Archive',
				'variables' => [
								'cars' => $cars
								]
				];
	}

	public function AdminEditCar(){
		if (isset($_POST['submit'])){
			$this->carsTable->update();
			
			header('location: /admin/cars.php');
		}
		else {
		$car= $this->carsTable->findWhere('id', $_GET['id']);
		$manu= $this->manufacturerTable->findAll();
		
		return [
		'template' => 'admin/editcar.html.php',
		'title' => 'Claires\'s Cars - Admin Cars',
		'variables' => [
					'cars' => $car,
					'manu' => $manu
					]
		];
		}
	}
	
	public function AdminDeleteCar(){
		$this->carsTable->deleteWhere('id');
		
		return [
			'template' => 'admin/deletecar.html.php',
			'title' => 'Claires\'s Cars - Admin Cars',
			'variables' => []
		];
	}
	
	public function AdminArchiveCar(){
		
		$this->carsTable->archiveCar('Y');
		
		return [
			'template' => 'admin/archivecar.html.php',
			'title' => 'Claires\'s Cars - Admin Archive',
			'variables' => []
		];
	}
	
		public function AdminRemoveRestoreCar(){
			
		if (isset($_POST['delete'])){
			$this->carsTable->deleteWhere('id');
		}
		else if (isset($_POST['restore'])){
			$this->carsTable->archiveCar('N');
		}
		
		return [
			'template' => 'admin/removerestorecar.html.php',
			'title' => 'Claires\'s Cars - Admin Archive',
			'variables' => []
		];
	}
	
	public function AdminAddCar(){
		if (isset($_POST['submit'])){
			$this->carsTable->addCar($_POST);

			$total = count($_FILES['image']['name']);	

			for ($i = 0; $i < $total; $i++) {
				if ($_FILES['image']['error'][$i] == 0) {
					$fileName = $this->carsTable->lastInsertId() . '_' . $i . '.jpg';
					move_uploaded_file($_FILES['image']['tmp_name'][$i], 'images/cars/' . $fileName);
				}
			}
		}
		
	$manu= $this->manufacturerTable->findAll();
		
		
		return [
				'template' => 'admin/addcar.html.php',
				'title' => 'Claires\'s Cars - Admin Cars',
				'variables' => [
								'manu' => $manu
								]
				];
	}
	
	public function AdminLogOut(){
		
		return [
				'template' => 'admin/adminlogout.html.php',
				'title'=> 'Claires\'s Cars - Admin User',
				'variables' => []
				];
	}
	
	public function AdminUsers(){
		
		$admins= $this->adminTable->findAll();
		
		return [
		'template'=>'admin/admins.html.php',
		'title'=> 'Claires\'s Cars - Admin User',
		'variables' => [
					'admins' => $admins]
		];
	}
	
	public function AdminAddUser() {
			
		$this->adminTable->addAdmin();

		return [
				'template' => 'admin/adminsupdated.html.php',
				'title' => 'Claires\'s Cars - Admin User',
				'variables' => [
								
								]
				];
	}
	
	public function AdminDeleteUser() {
		
		$this->adminTable->deleteAdmin('username');
		
		return [
			'template' => 'admin/adminsdeleted.html.php',
			'title' => 'Claires\'s Cars - Admin User',
			'variables' => []
			];
		
	}
	
	public function AdminEnquiries(){
		if (isset($_POST['id'])){
			$this->enquiriesTable->updateEnquiry();
		}
		$enquiries = $this->enquiriesTable->findWhere('status', 'pending');
		
		return [
			'template'=> 'admin/enquiries.html.php',
			'title'=> 'Claires\'s Cars - Enquiries',
			'variables' => [
				'enquiries' => $enquiries]
				];
	}
	
	public function AdminArticles(){

		if (isset($_POST['submit'])){
			$this->articlesTable->addArticle();
			
			$total = count($_FILES['image']['name']);	
	
	// runs if statement inorder to pull through all of the available images 
			for ($i = 0; $i < $total; $i++) {
				if ($_FILES['image']['error'][$i] == 0) {
					$fileName = $this->articlesTable->lastInsertId() . '_' . $i . '.jpg';
					move_uploaded_file($_FILES['image']['tmp_name'][$i], 'images/articles/' . $fileName);
				}
			}
		}
		else if(isset($_POST['delete'])){
			
			$this->articlesTable->deleteArticle();
		}
		
		return [
			'template'=> 'admin/articles.html.php',
			'title'=> 'Claires\'s Cars - Articles',
			'variables' => []
			];
	}
}