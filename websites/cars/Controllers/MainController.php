<?php
// the main class runs functions for the pages that are in the main navigation panel.
class MainController {
	// declare variables that are going to be used in the class
	private $enquiriesTable;
	private $articlesTable;
	
	// constructor to set the variables that are going to be used in the class.
	public function __construct($enquiriesTable, $articlesTable){

		$this->enquiriesTable = $enquiriesTable;
		$this->articlesTable = $articlesTable;
	}
	
	// functions that will run when the index calls them. These will pass variables into the layout file to display the content for that page.
	
	public function home() {
		
		$articles = $this->articlesTable->findAll();
		
		return [
				'template' => 'home.html.php',
				'title' => 'Claires\'s Cars - Home',
				'variables' => [
							'articles' => $articles]
				];
	}
		
	public function about() {
		return [ 
				'template' => 'about.html.php',
				'title' => 'Claires\'s Cars - About Us',
				'variables' => []
				];
	}
	
	public function contact() {
		return [
				'template' => 'contact.html.php',
				'title' => 'Claires\'s Cars - Contact Us',
				'variables' => []
				];
	}
	
	public function enquiries(){

		if (isset($_POST['submit'])){
			$this->enquiriesTable->insertEnquiry();
		}
		
		return [
				'template' => 'enquiries.html.php',
				'title' => 'Claire\’s Enquiries',
				'variables' => [
				]
				];
	}
	
	public function careers() {
		
		return [
				'template' => 'careers.html.php',
				'title' => 'Claire\’s Careers',
				'variables' => []
				];
	}
}