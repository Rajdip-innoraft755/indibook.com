<?php
class rout
{
  public $controller = "home";
  public $method = "index";
  public $params = array();
  public function __construct()
  {
    $url = $this->url();
    if (file_exists("../application/controllers/" . trim($url[0]) . ".php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once "../application/controllers/" . $this->controller . ".php";
    $this->controller = new $this->controller;

    if (!empty($url[1]) && method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }

    if (!empty($url)) {
      $this->params = $url;
    }
    call_user_func_array([$this->controller, $this->method], array($this->params));
  }
  
  public function url()
  {
    if (isset($_SERVER["REQUEST_URI"])) {
      $url = $_SERVER["REQUEST_URI"];
      $url = rtrim($url);
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", substr($url, 1));
    }
    return $url;
  }

}
