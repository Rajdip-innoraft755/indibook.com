<?php
class Home extends FrameWork {
	public function index()
	{
		$this->view("login");
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
		$this->view("register");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$myModel = $this->model("register");
			print_r($_FILES);
			if ($myModel->setter($_POST["fName"], $_POST["lName"], $_POST["userId"], $_POST["emailId"], $_POST["password"], $_FILES["imgUpload"])) {
				$this->redirect("");
			} else {
				$this->redirect("home/register");
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
}
