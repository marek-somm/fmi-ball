<?php

include "cors.php";
include "request.php";
include "database.php";

$db = new Database();
if (!$db) {
	die();
}

$sql = <<<EOF
	SELECT *
	FROM reservations
	WHERE user_id = 35 and table_id = 0
EOF;

$data = $db->fetchAll($sql);

echo($data);