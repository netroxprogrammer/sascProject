<?php
include_once "/../config/config.php";
		
class Database{
	public $host = DB_HOST;
	public $databaseName = DB_NAME;
	public $userName = DB_USER;
	public $password = DB_PASS;
	
	public $link;
	public $error;
	
	public  function __construct(){
		$this->Connection();
	}
	public function  Connection(){
		$this->link = new mysqli($this->host, $this->userName, $this->password, $this->databaseName);
		if($this->link){
			$this->error="Connection Error".$this->link->errno;
		}
	}

	public function updateData($query){
		$result= $this->link->query($query) or  die("Sorry Database field not match");
		if($result){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function addUserData($query){
		$result= $this->link->query($query) or  die("Sorry Database field not match");
		if($result){
			return true;
		}
		else{
			return false;
		}
	}
	public function LoginUser($query){
		$result= $this->link->query($query) or  die("Sorry Database field not match");
		if($result){
			return $this->link->insert_id;
		}
		else{
			return false;
		}
	}
	public function EmailVeirfy($query){
		$result= $this->link->query($query) or  die("Sorry Database field not match");
		if($result){
			return true;
		}
		else{
			return false;
		}
	}
	public function isDataExist($query){
		$result= $this->link->query($query) or  die("Sorry Database field not match");
		if($result->num_rows>0){
			return true;
		}
		else{
			return false;
		}
	}
	
	
	public function getDataList($query){
		$result= $this->link->query($query) or  die("Sorry Database field not match");
		if($result->num_rows>0){
			return $result;
		}
	}
}

?>