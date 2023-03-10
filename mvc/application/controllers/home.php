<?php

	class home extends frameWork{
		public function index(){
			echo "welcome to home";
		}

		public function action(){
			$this->view("homeView");
		}

	}

?>