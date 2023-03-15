<?php
class home extends frameWork
{
	public function index()
	{
		$this->view("login");
	}
	public function login()
	{
		$this->view("login");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$myModel = $this->model("login");
			if ($myModel->setter($_POST["userId"], $_POST["password"])) {
				$this->redirect("landing");
			} else {
				$this->redirect("");
			}
		}
	}
	public function register()
	{
		$this->view("register");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$myModel = $this->model("register");
			if ($myModel->setter($_POST["fName"], $_POST["lName"], $_POST["userId"], $_POST["emailId"], $_POST["password"])) {
				$this->redirect("landing");
			} else {
				$this->redirect("home/register");
			}
		}
	}
	public function landing()
	{
		$this->view("landing");
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
}
