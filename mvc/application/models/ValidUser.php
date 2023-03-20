<?php
class ValidUser extends ConnectDB {
	public function isValidUser()
	{
		$userId = $_POST["userId"];
		$sql = "select userId from user_details where BINARY userId ='$userId' ;";
		$result = $this->conn->query($sql);
		if ($result->num_rows == 0) {
					echo "* Invalid user ID.";
				}
				else{
					echo "* valid user ID.";
				}
			}
		}
?>