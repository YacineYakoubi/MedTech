<?php
class connection {

	protected $connection_db_link;
	public $servername ="eu-cdbr-azure-west-d.cloudapp.net";
	public $username = "bef2490729ef76";
	public $password = "ada45fa4";
	public $db = "medtechdatabase";

	function db_connection_fun(){

	try{
	///create connection object
	$this->connection_db_link = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);

    // set the PDO error mode to exception
	$this->connection_db_link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	return $this->connection_db_link;
	///catch connection error
	}catch(PDOException $e){
		echo "Error: <br>" .$e->getMessage();
		die();
	}
	}

	 
	function display_connection(){

	 	if($this->connection_db_link == true)
	 	{
	 		echo "connection success";
	 	}
	 }
}
	$conn = new connection;///create pdo connection
	$bd = $conn->db_connection_fun();///acces a la base

?>
