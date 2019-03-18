<?php
class Product{
	// database connection and table name
	private $conn;
	private $table_name = "product";

	//properties 
	public $id;
	public $name;
	public $price;

	// constructor with $db as database connection
	public function __construct($db){
		$this->conn = $db;
	}

	// read or get all products
	public function read(){

		// select all products query
		$query ="SELECT ID, Name, Price FROM $this->table_name";

		// prepare statement
		$stmt = $this->conn->prepare($query);

		// execute query
		$stmt->execute();

		return $stmt;
	}
	
	//create record or insert
	
	public function create(){
		//create insert query
		
		$query = "INSERT INTO $this->table_name SET Name = :Name,
		Price = :Price";
		
		
		//prepare statement
		$stmt = $this->conn->prepare($query);
		
		//Clean inserting data to avoid SQL injection
		$this->Name = htmlspecialchars(strip_tags($this->Name));
		$this->Price = htmlspecialchars(strip_tags($this->Price));
		
		//bind the data 
		$stmt->bindParam(':Name', $this->Name);
		$stmt->bindParam(':Price', $this->Price);
		
		if($stmt->execute()){
			return true;
		}
		
		//print error message
		printf("Error: %s.\n",$stmt->errorInfo());
		
		return false;
		
		
		
	}
	
	//Update query based on ID
	
	public function update(){
		
		
		$query = "UPDATE $this->table_name SET Name = :Name,
		Price = :Price WHERE ID = :ID";
		
		//prepare statement
		$stmt = $this->conn->prepare($query);
		
		//Clean inserting data to avoid SQL injection
		$this->Name = htmlspecialchars(strip_tags($this->Name));
		$this->Price = htmlspecialchars(strip_tags($this->Price));
		$this->ID = htmlspecialchars(strip_tags($this->ID));
		
		//bind the data 
		$stmt->bindParam(':Name', $this->Name);
		$stmt->bindParam(':Price', $this->Price);
		$stmt->bindParam(':ID', $this->ID);
		
		//execute query
		if($stmt->execute()){
			return true;
		}
		
		//print error message
		printf("Error: %s.\n",$stmt->errorInfo());
		
		return false;
		
	}
	
	public function delete(){
		//Delete Query based on ID
		
		$query = "DELETE FROM $this->table_name WHERE ID = :ID";
		
		//prepare statement
		$stmt = $this->conn->prepare($query);
		
		//clean data
		$this->ID = htmlspecialchars(strip_tags($this->ID));
		
		//Bind data
		$stmt->bindParam(':ID', $this->ID);
		
		//execute query
		if($stmt->execute()){
			return true;
		}
		//print error message
		printf("Error: %s.\n",$stmt->errorInfo());
		
		return false;
		
	}
	

// search products
function search($keywords){
 
    // select all query
    $query = "SELECT
				ID, Name, Price FROM $this->table_name WHERE            
                Name LIKE ? 
            ORDER BY
                ID ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // clean data
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "{$keywords}%";
 
    // bind data
    $stmt->bindParam(1, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

	
}