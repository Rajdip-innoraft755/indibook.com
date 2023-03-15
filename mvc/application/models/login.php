<?php

class login extends connectDB
{
	public $userId = "";
	public $password = "";

	public function setter($userId,$password){
		$this->userId=$userId;
		$this->password = $password;
		return $this->validate();
	}
	public function validate(){
		$sql = "select * from user_details where userId='$this->userId' and password=MD5('$this->password');";
		$result = $this->query($sql);
		if($result->num_rows == 0){
			$_SESSION["errorMsg"]="* Invalid Credentials.";
			return false;
		}
		else{
			while(($row = $result->fetch_assoc())){
				$_SESSION["active"]=TRUE;
				$_SESSION["userName"]=ucwords($row["fName"] . " " . $row["lName"]);
			}
		}
		return true;
	}	
}
?>