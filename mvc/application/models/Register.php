<?php
class Register extends ConnectDB {
	public $fName = "";
	public $lName = "";
	public $userID = "";
	public $emailId= "";
	public $password = "";
	public $profilePic = "assets/img/default-dp.jpg";
	public $uniqueId = "";

	
	public function setter($fName,$lName,$userID,$emailId,$password,$imgUpload){
		$this->fName = $fName;
		$this->lName = $lName;
		$this->userID = $userID;
		$this->emailId = $emailId;
		$this->password = $password;
		if($this->validate()){
			$this->imgStoring($imgUpload);
			$this->generateUniqueId();
			$this->InsertData();
			return true;
		}
		return false;
	}
	public function validate(){
		if(!(preg_match("/^[a-zA-Z ]*$/",$this->fName))){
			ErrorMsg::setter("fName","* first name only contains alphabet.");
			return false;
		}
		if(!(preg_match("/^[a-zA-Z ]*$/",$this->lName))){
			ErrorMsg::setter("lName","* last name only contains alphabet.");
			return false;
		}
		if(!(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$this->emailId))){
			ErrorMsg::setter("emailId","* not a valid email.");
			return false;
		}
		if(!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/",$this->password))){
			ErrorMsg::setter("password","* weak password.");
			return false;
		}
		return $this->validUser();
	}	

	public function imgStoring($imgUpload){
		if(!empty($imgUpload["name"])){
			$target_file = "assets/img/" . $this->userID . "-profile-pic-" .$imgUpload["name"];
			move_uploaded_file($imgUpload["tmp_name"],$target_file);
			$this->profilePic =		$target_file;
		}
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
					ErrorMsg::setter("userId","* user id already exists.");
					return false;
				}
			}
		}
		return true;
	}
	
	public function InsertData()
	{
		$sql = "insert into user_details values('$this->userID','$this->uniqueId','$this->fName','$this->lName','$this->emailId',MD5('$this->password'),'$this->profilePic','');";
		$this->query($sql);
	}
}
?>