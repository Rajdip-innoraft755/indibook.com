<?php
class validUser extends connectDB
{
	public function isValidUser()
	{
		$userId = $_POST["userId"];
		$sql = "select userId from user_details;";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if (strtolower($userId) != strtolower($row["userId"])) {
					echo "* Invalid user ID.";
					break;
				}
				else{
					echo "* valid user ID.";
					break;
				}
			}
		}
	}
}
?>