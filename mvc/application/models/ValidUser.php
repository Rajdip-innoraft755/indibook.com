<?php

class validUser extends ConnectDB{
  public function isValidUser($userId){
    session_start();
    $sql = "select * from user_details where binary userId='$userId';";
    $result = $this->query($sql);
    if($result->num_rows == 1 ){
      echo "* valid user ID.";
    }
    else{
      echo "* Invalid user ID.";
    }
  }
}
?>