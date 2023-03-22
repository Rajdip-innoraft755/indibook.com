<?php
class Home extends FrameWork {
	public function index()
	{
		$this->view("login");
	}
	public function registerview(){
		$this->view("register");
	}
	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$myModel = $this->model("login");
			if ($myModel->setter($_POST["userId"], $_POST["password"])) {
				$this->redirect("landing");
			}
			else{
				$this->view("login");
			} 
		}
	}
	public function register()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$myModel = $this->model("register");
			if ($myModel->setter($_POST["fName"], $_POST["lName"], $_POST["userId"], $_POST["emailId"], $_POST["password"], $_FILES["imgUpload"])) {
				$this->redirect("");
			} else {
				$this->view("register");
			}
		}
	}
	public function availableUser()
	{
		$myModel = $this->model("availableUser");
		$myModel->isAvailable();
	}
	public function validUser()
	{
		$myModel = $this->model("validUser");
		$myModel->isValidUser();
	}
	public function logout(){
		session_start();
		session_destroy();
		$this->redirect("");
	}
	public function forgotpassword($params){
		$myModel = $this->model("forgotPassword");
		switch($params){
			case "index":
				$this->view("forgotpassword");
				break;
			case "sendmail":
				$myModel->sendmail($_POST["userId"]);
				break;
			case "verifyotp":
				$myModel->verifyotp($_POST["otp"]);
				break;
			case "reset":
				$myModel->reset($_POST["password"]);
		}
		
	}
}
?>