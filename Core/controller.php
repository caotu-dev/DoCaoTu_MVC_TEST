<?php
class Controller {

	private $render;

	function render($file, $data = "") {
		$file_path = ROOT . $file . ".php";
		$items = $data;
	    if (file_exists($file_path)) {
            include_once($file_path);
        }else {
            include_once ROOT . 'show.php';
        }
	}

	 public function redirect($controller, $action) {
         echo "<script>window.location = '?page=".$controller."&action=".$action."'</script>";
    }
}