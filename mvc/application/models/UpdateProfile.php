<?php


class UpdateProfile extends ConnectDB{
  public static $fNameErr = "";
  public static $lNameErr = "";
  public static $emailIdErr = "";
  public static $passErr = "";
  public function isValid($fName,$lName,$emailId,$bio,$password){
    $sql = "select password from user_details where binary userId ='" . $_SESSION["userId"] ."'";
    $result = $this->query($sql);
    if($result->num_rows == 1){
      $this->update($fName,$lName,$emailId,$bio);
    }
  }

  public function update($fName,$lName,$emailId,$bio){
    $sql = "UPDATE user_details SET fName = '$fName',lName='$lName',emailId='$emailId',bio='$bio' WHERE userId ='" . $_SESSION["userId"] ."'";
    $this->query($sql);
  }
}

?>