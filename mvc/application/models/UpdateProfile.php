<?php


class UpdateProfile extends ConnectDB{
  public $profilePic;
  public function isValid($fName,$lName,$emailId,$bio,$password,$imgUpload){
    $sql = "select password,profilePic from user_details where binary userId ='" . $_SESSION["userId"] ."'";
    $result = $this->query($sql); 
    if($result->num_rows == 1){
      $bio = htmlspecialchars($bio, ENT_QUOTES);
      $this->profilePic = $result->fetch_assoc()["profilePic"];
      $this->imgStoring($imgUpload);
      $this->update($fName,$lName,$emailId,$bio,$this->profilePic);    
      return TRUE; 
    }
    return FALSE;
  }

  public function imgStoring($imgUpload){
		if(!empty($imgUpload["name"])){
			$target_file = "assets/img/" . $_SESSION["userId"] . "-profile-pic-" .$imgUpload["name"];
			move_uploaded_file($imgUpload["tmp_name"],$target_file);
			$this->profilePic =	"/" . $target_file;
      return true;
		}
    return false;
	}

  public function update($fName,$lName,$emailId,$bio,$profilePic){
    $sql = "UPDATE user_details SET fName = '$fName',lName='$lName',emailId='$emailId',bio='$bio',profilePic='$profilePic' WHERE userId ='" . $_SESSION["userId"] ."'";
    $this->query($sql);
  }
}

?>