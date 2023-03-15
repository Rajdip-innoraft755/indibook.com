<?php

require_once "../config/config.php";
class connectDB
{
	public $conn;
	public function __construct()
	{
		$this->conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}

	public function query($sql){
		$result = $this->conn->query($sql);
		return $result;
	}
}


?>