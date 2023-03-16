<?php

	class Landing extends FrameWork {
		public function index() {
			session_start();
			if($_SESSION["active"] === TRUE){
				$myModel = $this->model("dashboard");
				$myModel->fetchData();
				$this->view("dashboard");
      }
			else {
				$this->redirect("");
			}
		}
		public function profile(){
			$this->view("profile");
		}
		public function post(){
			session_start();
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$myModel = $this->model("makePost");
				if ($myModel->addPost($_POST["postContent"])) {
					$this->redirect("landing");
				}
			}
		}
	}
?>