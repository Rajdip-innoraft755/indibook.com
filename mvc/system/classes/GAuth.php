<?php

require '../vendor/autoload.php';
class GAuth
{
  public static function createUrl()
  {
    $google_client = new Google_Client();
    $google_client->setClientId(GCLIENTID);
    $google_client->setClientSecret(GCLIENTSECRET);
    $google_client->setRedirectUri(GREDIRECT);
    $google_client->addScope('email');
    $google_client->addScope('profile');
    return $google_client->createAuthUrl();
  }
  public static function authenticate($code)
  {
    $google_client = new Google_Client();
    $google_client->setClientId(GCLIENTID);
    $google_client->setClientSecret(GCLIENTSECRET);
    $google_client->setRedirectUri(GREDIRECT);
    $google_client->addScope('email');
    $google_client->addScope('profile');
    $token = $google_client->fetchAccessTokenWithAuthCode($code);
    if (!isset($token['error'])) {
      $google_client->setAccessToken($token['access_token']);
      $_SESSION['access_token'] = $token['access_token'];
      $google_service = new Google_Service_Oauth2($google_client);
      $data = $google_service->userinfo->get();
      return $data;
    }
  }
}

?>
