<?php

class Landing extends FrameWork
{
	public function index()
	{
		session_start();
		if ($_SESSION["active"] === TRUE) {
			$myModel = $this->model("dashboard");
			$myModel->fetchData();
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
			$myModel = $this->model("makePost");
			if ($myModel->addPost($_POST["postContent"])) {
				$this->redirect("landing");
			}
		}
	}
	public function UpdateProfile()
	{
		session_start();
		$myModel = $this->model("updateProfile");
		$myModel->isValid($_POST["fName"],$_POST["lName"],$_POST["emailId"],$_POST["bio"],$_POST["password"]);
		$this->profile();
	}
}
?>