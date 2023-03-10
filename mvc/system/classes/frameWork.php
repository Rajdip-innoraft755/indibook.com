<?php
class frameWork
{

	public function view($viewName)
	{
		if(file_exists("../application/views/$viewName.php")){

			require_once "../application/views/$viewName.php";
		}
	}

	public function model($modelName){
		if(file_exists("../application/views/$modelName.php")){

		}
	}
}

?>