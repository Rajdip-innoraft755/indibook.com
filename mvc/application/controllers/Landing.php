<?php

class Landing extends FrameWork
{
	public function index()
	{
		session_start();
		if ($_SESSION["active"] === TRUE) {
			$myModel = $this->model("dashboard");
			$myModel->fetchData(0);
			$this->view("dashboard");
		} else {
			$this->redirect("");
		}
	}
	public function profile()
	{
		session_start();
		if ($_SESSION["active"] === TRUE) {
			$myModel = $this->model("profile");
			$myModel->fetchData();
			$this->view("profile");
		} else {
			$this->redirect("");
		}
	}
	public function makePost()
	{
		session_start();
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (!empty($_POST["postContent"]) || !empty($_FILES["postImage"])) {
				$myModel = $this->model("makePost");
				if ($myModel->addPost($_POST["postContent"], $_FILES["postImage"])) {
					// $this->redirect("landing");
				}
			}
		}
		$this->redirect("landing");
	}
	public function UpdateProfile()
	{
		session_start();
		$myModel = $this->model("updateProfile");
		if ($myModel->isValid($_POST["fName"], $_POST["lName"], $_POST["emailId"], $_POST["bio"], $_POST["password"], $_FILES["imgUpload"])) {

			$this->redirect("landing/profile");
		} else {
			$this->view("profile");
		}
	}
	public function validPassword()
	{
		$myModel = $this->model("validPassword");
		$myModel->isValidPassword($_POST["password"]);
	}

	public function loadmore()
	{
		session_start();
		$myModel = $this->model("dashboard");
		$myModel->fetchData(10);
	}

	public function user($userId)
	{
		session_start();
		$myModel = $this->model("OthersProfile");
		$myModel->fetchData(base64_decode($userId));
		$this->view("othersprofile");
	}
}
?>