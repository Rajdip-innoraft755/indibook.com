<?php
class AvailableUser extends ConnectDB {
	public function isAvailable(){
		$userId = $_POST["userId"];
		$sql="select userId from user_details;";
		$result=$this->conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if(strtolower($userId) == strtolower($row["userId"])){
					?>
					* User Id not available
					<?php
					break;
				}
			}
		}
	}
}            
?>
