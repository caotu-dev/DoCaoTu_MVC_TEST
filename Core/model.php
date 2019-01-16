<?php

include './App/config.php';

class Database {

	private $connection;
	private $getData;
	private $executeQuery;

    private $query;
    private $conditions;

	function connectToDatabase() {

		$this->connection =  new mysqli(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);

		// Check database connection
		if (!$this->connection) {
			throw new Exception('Failed');
		}
		return $this->connection;
	}

    public function executeDatabaseQuery($query) {
        $this->executeQuery = $this->connection->query($query);
        if (!$this->executeQuery) {
            echo $this->connection->error;
        }
        return $this->executeQuery;
    }

    public function getDataFromDatabase($query){
        $this->getData = $this->connection->query($query);
        if (!$this->getData) {
            return false;
        }else {
            $rows = array();
            if ($this->getData->num_rows > 0) {
                while ($row = $this->getData->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }else {
                return null;
            }
        }
    }

    function filterRequestValue($data) {
        $exclude = $values = array();

        if( !is_array($exclude) ) $exclude = array($exclude);

        foreach( array_keys($data) as $key ) {
            if( !in_array($key, $exclude) ) {
                if ($data[$key] != '') {
                	$values[] = "'" . mysqli_real_escape_string($this->connection, $data[$key]) . "'";
                }
            }
        }
        $values = implode(",", $values);
        return $values;
	}

	function filterRequestKeyAndValue($data) {
        $dataArr = $keys = $exclude = $values = array();

        if( !is_array($exclude) ) $exclude = array($exclude);

        foreach( array_keys($data) as $key ) {
            if( !in_array($key, $exclude) ) {
                if ($data[$key] != '') {
                	$value = "'" . mysqli_real_escape_string($this->connection, $data[$key]) . "'";
                	$dataArr[] = $key . " = " . $value ;
                }
            }
        }
        $dataArr = implode(", ", $dataArr);
        return $dataArr;
	}

    // Insert, update, show, delete methods

    public function insert($table, $fields, $data) {
        $this->query = "INSERT INTO $table($fields) VALUES($data)";
        $this->executeDatabaseQuery($this->query);
        if (!$this->query) {
            return false;
        }else {
            return $this->query;
        }
    }

    public function update($table, $data, $id) {
        $this->query = "UPDATE $table SET $data WHERE id = $id";
        $this->executeDatabaseQuery($this->query);
        if (!$this->query) {
            return false;
        }else {
            return $this->query;
        }
    }

    public function find($table, $data, $id) {
        $this->query  = "SELECT $data FROM $table WHERE id = $id";
        $data = $this->getDataFromDatabase($this->query);
        if (!$data) {
            return null;
        }else {
            return $data;
        }
    }

    public function view($table, $data, $conditions = '') {
        $this->query  = "SELECT $data FROM $table";
        $data = $this->getDataFromDatabase($this->query);
        if (!$data) {
            return null;
        }else {
            return $data;
        }
    }

    public function delete($table, $id) {
        $this->query = "DELETE FROM $table WHERE id = $id";
        $this->executeDatabaseQuery($this->query);
        if (!$this->query) {
            return false;
        }else {
            return $this->query;
        }
    }
}
