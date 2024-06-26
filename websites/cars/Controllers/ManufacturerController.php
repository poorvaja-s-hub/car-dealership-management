<?php

// class to run on manufacturing pages outside the admin area of the site.
class ManufacturerController {
	// declare variables to use in the class
	private $carsTable;
	private $manufacturerTable;
	
	// constructor to set the variables for the class
	public function __construct($carTable, $manufacturerTable){
		$this->carsTable = $carTable;
		$this->manufacturerTable = $manufacturerTable;
	}
	
	// function to run when called by the index page this will pass variables to the layout file in order to set the content that is going to be displayed on the screen
	public function ManufacturerCars(){
		$cars = $this->carsTable->findWhere('manufacturerId', $_GET['manufacturer']);
		$manu = $this->manufacturerTable->findAll();
		$manuCars = $this->manufacturerTable->findWhere('id', $_GET['manufacturer']);
		$manuName = $this->manufacturerTable->findName('id', $_GET['manufacturer']);
		
		return [ 
				'template' => 'manufacturercars.html.php',
				'title' => 'Claires\'s Cars - Manufacturers',
				'variables' => [
								'cars' => $cars,
								'manu' => $manu,
								'manuCars' => $manuCars,
								'manuName' => $manuName
								]
				];
	} 
}