<?php

class Login extends ConnectDB {
	public $userId = "";
	public $password = "";

	public function setter($userId,$password){
		$this->userId=$userId;
		$this->password = $password;
		return $this->validate();
	}
	public function validate(){
		$sql = "select * from user_details where BINARY userId='$this->userId' and password=MD5('$this->password');";
		$result = $this->query($sql);
		if($result->num_rows == 0){
			ErrorMsg::setter("logIn","* Invalid credentials");
			return false;
		}
		else{
			while(($row = $result->fetch_assoc())){
				session_start();
				$_SESSION["active"]=TRUE;
				$_SESSION["userId"]=$row["userId"];
			}
		}
		return true;
	}	
}
?>
