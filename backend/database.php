<?php

class Database extends SQLite3 {
	function __construct() {
		$db_name = "/var/www/fmi-ball/storage/database/database.sqlite";

		$this->open($db_name);
	}
	
	function run($sql) {
		$sql = $this->escapeString($sql);

		$ret = $this->exec($sql);
		return $ret;
	}

	function fetchData($sql) {
		$sql = $this->escapeString($sql);

		$ret = $this->query($sql);
		return $ret;
	}

	function fetchFirst($sql) {
		$data = $this->fetchData($sql);
		if($data) {
			return $data->fetchArray(SQLITE3_ASSOC);
		}
		return $data;
	}

	function fetchAll($sql) {
		$data = $this->fetchData($sql);

		$ret = array();

		while ($row = $data->fetchArray()) {
			$ret[] = $row;
		}

		return $ret;
	}
}