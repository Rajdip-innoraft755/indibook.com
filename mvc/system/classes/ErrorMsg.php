<?php

class ErrorMsg
{
  public static $logIn;
  public static $fName;
  public static $lName;
  public static $userId;
  public static $emailId;
  public static $password;

  public static function getter($Errvar)
  {
    $result = "";
    switch ($Errvar) {
      case "logIn":
        echo ErrorMsg::$logIn;
        ErrorMsg::setter("logIn", "");
      case "fName":
        echo ErrorMsg::$fName;
        ErrorMsg::setter("fName", "");
      case "lName":
        $result = ErrorMsg::$lName;
        ErrorMsg::setter("lName", "");
      case "userId":
        echo ErrorMsg::$userId;
        ErrorMsg::setter("userId", "");
      case "emailId":
        echo ErrorMsg::$emailId;
        ErrorMsg::setter("emailId", "");
      case "password":
        echo ErrorMsg::$password;
        ErrorMsg::setter("password", "");
    }
    return $result;
  }

  public static function setter($Errvar, $Errmsg)
  {
    switch ($Errvar) {
      case "logIn":
        ErrorMsg::$logIn = $Errmsg;
        break;
      case "fName":
        ErrorMsg::$fName = $Errmsg;
        break;
      case "lName":
        ErrorMsg::$lName = $Errmsg;
        break;
      case "userId":
        ErrorMsg::$userId = $Errmsg;
        break;
      case "emailId":
        Errormsg::$emailId = $Errmsg;
        break;
      case "password":
        ErrorMsg::$password = $Errmsg;
        break;
    }
  }
}


?>