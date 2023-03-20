<?php
class Profile extends ConnectDB{
  public static $profilePic;
  public static $fName;
  public static $lName;
  public static $emailId;
  public static $bio;

  public function fetchData(){
    $sql = "select * from user_details where binary userId='" . $_SESSION["userId"] . "';";
    $result = $this->query($sql);
    while($row = $result->fetch_assoc()){
      Profile::$fName = ucwords($row["fName"]);
      Profile::$lName = ucwords($row["lName"]);
      Profile::$profilePic = "/".$row["profilePic"];
      Profile::$emailId = $row["emailId"];
      Profile::$bio = $row["bio"];
    }
  }
}
?>