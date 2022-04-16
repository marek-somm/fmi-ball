<?php

if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
	header("Location: /");
	die();
}

class Log {
	function __construct() {
	}

	function append($txt) {
		$file_name = "/var/www/fmi-ball/storage/log.txt";
		$time = date("d.m.Y H:i:s");
		$log_file = fopen($file_name, "a");
		fwrite($log_file, "[" . $time . "]: " . $txt . "\n");
		fclose($log_file);
	}
}