<?php

function response($msg, $code = 500) {
	header("content-type:application/json");
	http_response_code($code);
	echo (json_encode(array("message" => $msg, "status" => $code)));
	die();
}