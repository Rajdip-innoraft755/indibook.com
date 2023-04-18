<?php
class AvailableUser extends ConnectDB
{
	public function isAvailableUserId()
	{
		$userId = $_POST["userId"];
		$sql = "select userId from user_details where binary userId='$userId';";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			echo json_encode(["isAvialableUserId" => "* Invalid User Id."]);
		}
		else {
			echo json_encode(["isAvialableUserId" => ""]);
		}
	}

	public function isAvailableEmailId(){
		$emailId = $_POST["emailId"];
		$sql = "select emailId from user_details where binary emailId='$emailId';";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			echo json_encode(["isAvialableEmailId" => "* Email id already occupied."]);
		}
		else {
			echo json_encode(["isAvialableEmailId" => ""]);
		}
	}
}
?>