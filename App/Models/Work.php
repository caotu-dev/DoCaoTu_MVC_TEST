<?php

include "./Core/model.php";

class Work extends Database {

    private $table = 'works';
	private $fields = 'name, starting_date, ending_date, status';

	public function __construct() {
		parent::connectToDatabase();
	}

    public function add($data) {
    	$data = $this->filterRequestValue($data);
    	$this->insert($this->table, $this->fields, $data);
    }

    public function show() {
    	return $this->view($this->table, '*');
    }

    public function findById($id) {
    	return $this->find($this->table, '*', $id);
    }

    public function updateById($data, $id) {
    	$data = $this->filterRequestKeyAndValue($data);
    	$this->update($this->table, $data, $id);
    }

    public function deleteById($id) {
    	$this->delete($this->table, $id);
    }
}