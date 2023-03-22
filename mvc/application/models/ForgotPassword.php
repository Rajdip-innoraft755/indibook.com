<?php
class ForgotPassword extends ConnectDB
{
  public function sendmail($userId)
  {
    $sql = "select emailId from user_details where binary userId='$userId'";
    $result = $this->query($sql);
    session_start();
    $_SESSION["userId"] = $userId;
    $_SESSION["otp"] = rand(10000, 99999);
    $address = $result->fetch_assoc()["emailId"];
    $body = "Dear User ,<br><br> Here is your OTP. Please , don't share it with Others. <br><br> OTP : " . $_SESSION["otp"];
    $subject = "OTP TO RESET PASSWORD.";
    try{
      Mailer::sendmail($address, $subject, $body);
      echo "* OTP sent in your registered mail Id successfully";
    }
    catch(Exception $e){
      echo "* Invalid Mail";
    }
    
    
  }

  public function verifyotp($otp)
  {
    session_start();
    if ($otp == $_SESSION["otp"]) {
      echo "* correct";
      unset($_SESSION["otp"]);
    } else {
      echo "* incorrect";
    }
  }

  public function reset($password)
  {
    session_start();
    $sql = "update user_details set password=MD5('$password') where userId='" . $_SESSION["userId"] . "';";
    $this->query($sql);
    try{
      $this->query($sql);
      echo "Password Updated.";
    }
    catch(Exception $e){
      echo "Password is not updated successfully.";
    }
  }
}
?>