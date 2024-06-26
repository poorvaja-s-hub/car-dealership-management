<?php
// controller for car pages that aren't in the admin area. 
class CarController {
	
	// declare the variables used in the class
	private $carsTable;
	private $manufacturerTable;
	
	// constructer to set the variables that will be used
	public function __construct($carTable, $manufacturerTable){
		$this->carsTable = $carTable;
		$this->manufacturerTable = $manufacturerTable;
	}
	
	// function to pull through all the cars in the database.
	public function cars() {
		$cars = $this->carsTable->findWhere('archive', 'N');

		$manu = $this->manufacturerTable->findAll();
		
		return [
				'template' => 'cars.html.php',
				'title' => 'Claires\'s Cars - Our Cars',
				'variables' => [
							'cars' => $cars,
							'manu' => $manu
							]
				]; 
	}
	
}