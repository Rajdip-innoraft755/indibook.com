<?php

class ErrorMsg{
  public static $logIn;

  public static function getter($Errvar){
    switch($Errvar){
      case "logIn" :
        echo ErrorMsg::$logIn;
        ErrorMsg::setter("logIn","");
    }
  }
  
  public static function setter($Errvar,$Errmsg){
    switch($Errvar){
      case "logIn" :
        ErrorMsg::$logIn = $Errmsg;
    }
  }
}


?>