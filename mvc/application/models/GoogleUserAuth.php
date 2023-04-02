<?php
class GoogleUserAuth extends ConnectDB
{
  public function RegisterUser($code)
  {
    $data = GAuth::authenticate($code);
    $userId = $this->generateUserId($data["email"]);
    $uniqueId = $this->generateUniqueId($data["email"]);
    $password = $this->generatePass();
    $actualUserId = $this->insertDB($userId, $uniqueId, $data["given_name"], $data["family_name"], $data["email"], $data["picture"], $password);
    echo $actualUserId;
    if ($userId != $actualUserId) {
      $userId = $actualUserId;
    } else {
      $this->sendRegistrationMail($data["email"], $userId, $password);
    }
    session_start();
    $_SESSION["active"] = TRUE;
    $_SESSION["userId"] = $userId;
    return TRUE;
  }
  public function generateUserId($email)
  {
    $email_part = (explode("@", $email))[0];
    echo $email_part;
    $number_part = rand(10000, 99999);
    return $email_part . $number_part;
  }
  public function generateUniqueId($email)
  {
    $t = time();
    return date("Y-m-d H:i:s", $t) . $email;
  }
  public function generatePass()
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < 10; $i++) {
      $password = $password . $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
  }
  public function sendRegistrationMail($emailId, $userId, $password)
  {
    $address = $emailId;
    $body = "Dear Google User ,<br><br> Here is your username : $userId  <br><br> Password : $password <br><br> you can manually login with these credentials without google login.";
    $subject = "USER CREDENTIALS";
    Mailer::sendmail($address, $subject, $body);
  }
  public function insertDB($userId, $uniqueId, $fName, $lName, $emailId, $profilePic, $password)
  {
    try {
      $sql = "insert into user_details(userId,uniqueId,fName,lName,emailId,profilePic,password) values('$userId','$uniqueId','$fName','$lName','$emailId','$profilePic',MD5('$password'));";
      $this->query($sql);
      return $userId;
    } catch (Exception $e) {
      $sql = "select userId from user_details where emailId ='$emailId';";
      $result = $this->query($sql);
      return $result->fetch_assoc()["userId"];
    }
  }
}

?>