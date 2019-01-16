<?php
include ('./Core/Controller.php');
include ('./App/Models/Work.php');

class WorkController extends Controller {

    private $work;

    public function __construct() {
		$this->work = new Work();
	}

	// Add work
	public function add($request) {
		if (isset($_POST['submit'])) {
			$this->work->add($request);
		}
		$this->render('add');
	}

	public function show() {
		$items = $this->work->show();
		foreach ($items as $key => $item) {
			$statusCode = $items[$key]['status'];
			switch ($statusCode) {
				case '1':
					$items[$key]['status'] = 'Planning';
					break;
				case '2':
					$items[$key]['status'] = 'Doing';
					break;
				case '3':
					$items[$key]['status'] = 'Complete';
					break;
				default:
					# code...
					break;
			}
		}
		$this->render('show', $items);
	}

	public function edit($request) {
		if (isset($_GET['id'])) {
		    $id = $_GET['id'];
		    $item = $this->work->findById($id);
		    $this->render('edit', $item);
		    if (isset($_POST['submit'])) {
				$this->update($request, $id);
				$this->redirect('work', 'show');
			}
		}
	}

	public function update($request, $id) {
		$this->work->updateById($request, $id);
	}

	public function delete($id) {
		if (isset($_GET['id'])) {
		    $id = $_GET['id'];
		    $this->work->deleteById($id);
		    $this->redirect('work', 'show');
		}
	}

}