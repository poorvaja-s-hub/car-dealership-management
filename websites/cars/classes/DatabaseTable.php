<?php
// database class with all the queries included.
class DatabaseTable {
	private $pdo;
	private $table;
	private $primaryKey;

	// database constructor to set the pdo, table and primarykey
	public function __construct($pdo, $table, $primaryKey) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
	}
	
	// functions to run specific queries and tasks interacting with the database. Some functions have a return section to return information back from the function.
	public function findAll(){
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
	public function findWhere($field, $value){

		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
		
		$criteria = [
				'value' => $value
				];
		
		$stmt->execute($criteria);
		
		return $stmt->fetchAll();
	}
	
	public function update(){
		$stmt = $this->pdo->prepare('UPDATE ' . $this->table . '
								SET name = :name, 
								    description = :description, 
								    price = :price,
								    manufacturerId = :manufacturerId,
									oldPrice = :oldPrice
								   WHERE id = :id 
						');
		$criteria = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'manufacturerId' => $_POST['manufacturerId'],
			'oldPrice' => 'Was £' . $_POST['oldPrice'],
			'id' => $_POST['id']
		];
		
		$stmt->execute($criteria);
	}
	
	public function deleteWhere($field){
		$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
		
		$criteria = ['value' => $_POST['id']];
		
		$stmt->execute($criteria);
	}
	
	public function archiveCar($value){

		$stmt = $this->pdo->prepare('UPDATE ' . $this->table . '
									SET archive = :value
									WHERE id = :id ');
		
		$criteria = [
				'value' => $value,
				'id' => $_POST['id']
				];
		$stmt->execute($criteria);
		
	}
	
	public function addCar(){
		$stmt = $this->pdo->prepare('INSERT INTO cars (name, description, price, manufacturerId, archive, engineType, mileage, addedBy)
									VALUES (:model, :description, :price, :manufacturerId, :archive, :engineType, :mileage, :addedBy)');
		
		$criteria = [
			'model' => $_POST['model'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'manufacturerId' => $_POST['manufacturerId'],
			'archive' => 'N',
			'engineType' => $_POST['engineType'],
			'mileage' => $_POST['mileage'],
			'addedBy' => $_SESSION['user']
			];
			
		$stmt->execute($criteria);
	}
	
	public function addManufacturer(){
		$stmt = $this->pdo->prepare('INSERT INTO manufacturers (name)
									VALUES (:name)');
		
		$criteria = [
			'name' => $_POST['name']
			];
		
		$stmt->execute($criteria);
		
	}
	
	public function updateManufacturer(){
		$stmt = $this->pdo->prepare('UPDATE ' . $this->table . '
									SET name = :name
									WHERE id = :id ');
		
		$criteria = [
				'name' => $_POST['name'],
				'id' => $_POST['id']
				];
		$stmt->execute($criteria);
	}
	
		public function findName($field, $value){

		$stmt = $this->pdo->prepare('SELECT name FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
		
		$criteria = [
				'value' => $value
				];
		
		$stmt->execute($criteria);
		
		return $stmt->fetchAll();
	}
	
	public function addAdmin(){
		$stmt = $this->pdo->prepare('INSERT INTO users (username, password, firstName, master)
									VALUES ( :username, :password, :firstName, :master)');
		
		$criteria = [
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'firstName' => $_POST['firstName'],
				'master' => $_POST['master']
				];
		$stmt->execute($criteria);
	
	}
	
	public function deleteAdmin($field){
		$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
		
		$criteria = ['value' => $_POST['username']];
		
		$stmt->execute($criteria);
	}
	
	public function insertEnquiry(){
		$stmt = $this->pdo->prepare('INSERT INTO enquiries (customerName, enquiry, phoneNumber, email, status)
									VALUES ( :customerName, :enquiry, :phoneNumber, :email, :status)');
		
		$criteria = [
				'customerName' => $_POST['customerName'],
				'enquiry' => $_POST['enquiry'],
				'phoneNumber' => $_POST['phoneNumber'],
				'email' => $_POST['email'],
				'status' => 'pending'
				];
		$stmt->execute($criteria);
	}
	
	public function updateEnquiry(){
		$stmt = $this->pdo->prepare('UPDATE ' . $this->table . '
									SET status = :status
									WHERE id = :id ');
		
		$criteria = [
				'status' => $_POST['status'],
				'id' => $_POST['id']
				];
		$stmt->execute($criteria);
	}
	
	public function addArticle(){
			$stmt = $this->pdo->prepare('INSERT INTO articles (date, name, content, addedBy)
									VALUES ( :date, :name, :content, :addedBy)');
		
		$criteria = [
				'date' => $_POST['date'],
				'name' => $_POST['name'],
				'content' => $_POST['content'],
				'addedBy' => $_SESSION['user']
				];
		$stmt->execute($criteria);
	}
	
	public function deleteArticle(){

			$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE name = :name AND date = :date');
			
			$criteria = [
						'date' => $_POST['date'],
						'name' => $_POST['name']
						];
			$stmt->execute($criteria);
	}
	
	// gets the last id in the table
	
	public function lastInsertId() {
		return $this->pdo->lastInsertId();	
	}

}