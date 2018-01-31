<?php 
// this will be the basis for the mysql calls. 
// I'll make a separate file and class for each table.
class db{
	private $host;
	private $user;
	private $pass;
	private $dbname;
	protected function connect(){
		$this->host = "localhost";
		$this->user = "phphangover";
		$this->pass = "phphangover";
		$this->dbname = "phphangover";
		$conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		return $conn;
	}
	protected function inquery($arg,$from){
		$sql = "SELECT $arg FROM $from";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
}
// THIS SHOULDN'T BE HERE, THIS SHOULDN'T EXIST!! - but it does
class God extends db{
	protected function q($sql){
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	public function preq($sql){
		echo '<pre>'.print_r($this->q($sql)).'</pre>';		
	}
}
?>