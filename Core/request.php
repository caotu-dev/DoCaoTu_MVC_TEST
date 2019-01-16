<?php
const ROOT = './App/Views/';

class Request {

	private $render;

	function setPageContent() {
		if (isset($_GET['page']) && isset($_GET['action'])) {
			$page = $_GET['page'];
		    $action = $_GET['action'];

		    $controller = ucfirst($page);
			require ('./App/Controllers/'.$controller.'Controller.php');
			$newController = $controller.'Controller';
			$method = new $newController();
			$request = $_POST;

			switch ($action) {
				case 'add':
				        $method->add($request);
				        break;
				case 'show':
				        $items = $method->show();
				        break;
				case 'edit':
				        $method->edit($request);
				        break;
				case 'delete':
				        $method->delete($request);
				        break;
				default:
						include ROOT . 'done.php';
				        break;
			}
		}else {
	        include ROOT . 'done.php';
	    }
	}

}
