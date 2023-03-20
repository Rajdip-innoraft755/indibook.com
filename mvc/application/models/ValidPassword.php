<?php

class validPassword extends ConnectDB{
  public function isValidPassword($password){
    session_start();
    $sql = "select * from user_details where binary userId='" . $_SESSION["userId"] . "' and password=MD5('$password')";
    $result = $this->query($sql);
    if($result->num_rows == 0){
      echo "* Incorrect password.";
    }
    else{
      echo "";
    }
  }
}
?>