<?php
class FrameWork {
	public function view($viewName)
	{
		if (file_exists("../application/views/$viewName.php")) {
			require_once "../application/views/$viewName.php";
		}
	}

	public function model($modelName)
	{
		if (file_exists("../application/models/". ucwords($modelName) . ".php")) {
			require_once "../application/models/". ucwords($modelName) . ".php";
			return new $modelName;
		}
	}

	public function redirect($path)
	{
		header("location:" . BASEURL . "/" . $path);
	}
}
?>
