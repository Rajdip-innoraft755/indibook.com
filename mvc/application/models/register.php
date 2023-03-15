<?php
class register extends connectDB
{
	public $fName = "";
	public $lName = "";
	public $userID = "";
	public $emailId= "";
	public $password = "";
	public $uniqueId = "";
	
	public function setter($fName,$lName,$userID,$emailId,$password){
		$_SESSION["Err"] = array();
		$this->fName = $fName;
		$this->lName = $lName;
		$this->userID = $userID;
		$this->emailId = $emailId;
		$this->password = $password;
		if($this->validate()){
			$this->generateUniqueId();
			$this->InsertData();
			return true;
		}
		return false;
	}
	public function validate(){
		if(!(preg_match("/^[a-zA-Z ]*$/",$this->fName))){
			$_SESSION["Err"]["fName"] = "* only contains alphabet.";
			return false;
		}
		if(!(preg_match("/^[a-zA-Z ]*$/",$this->lName))){
			$_SESSION["Err"]["lName"] = "* only contains alphabet.";
			return false;
		}
		if(!(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$this->emailId))){
			$_SESSION["Err"]["emailId"] = "* not a valid email.";
			return false;
		}
		if(!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/",$this->password))){
			$_SESSION["Err"]["password"] = "* weak password.";
			return false;
		}
		return $this->validUser();
	}	
	public function generateUniqueId(){
		$t = time();
		$this->uniqueId = date("Y-m-d H:i:s",$t) . $this->emailId ;
	}
	public function validUser(){
		$userId = $_POST["userId"];
		$sql="select userId from user_details;";
		$result=$this->conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if($userId == $row["userId"]){
					$_SESSION["Err"]["userId"] = "* user id already exists.";
					return false;
				}
			}
		}
		return true;
	}
	public function InsertData()
	{
		$sql = "insert into user_details values('$this->userID','$this->uniqueId','$this->fName','$this->lName','$this->emailId',MD5('$this->password'));";
		$this->query($sql);
	}
}
?>