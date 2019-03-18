<?php
class Database{
	//DB connections //private can be only accessed in this class
	private $host = "localhost";
	private $db_name = "product_api";
	private $username = "root";
	private $password = "";
	public $conn;
	// get the database connection
	public function getConnection(){
		//setting this varible to null
		$this->conn = null;

		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}
		return $this->conn;
	}
}
