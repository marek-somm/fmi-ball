<?php

include "cors.php";
include "request.php";
include "database.php";

$db = new Database();
if (!$db) {
	die();
}

function mailto($email, $subject, $message) {
	$from = "FMI-Ball <info@fmi-ball.de>";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= "From:" . $from . "\r\n";

	mail($email, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
}

$sql = <<<EOF
	SELECT email
	FROM Newsletter
EOF;

$res = $db->fetchData($sql);

$emails = array();

while ($row = $res->fetchArray()) {
	$emails[] = $row["email"];
}

foreach($emails as &$email) {
	$sql = <<<EOF
		SELECT token
		FROM Newsletter
		WHERE email = "$email"
	EOF;

	$token = $db->fetchFirst($sql)["token"];
	
	$msg = <<<EOF
		<p>Hallo,</p>
		<p>Sie erhalten diese Mail, da Sie sich in den Newslatter eingetragen haben.</p>
		<p>Wir können Ihnen nun voller Vorfreude mitteilen, dass die Kartenreservierungen gestartet sind. Sie können eine Reservierung auf unserer Homepage <a href="https://www.fmi-ball.de/karten">fmi-ball.de/karten</a> vornhemen.</p>
		<p>Mit besten Grüßen<br>
		<i>Ihr FMI-Ball Orga-Team</i></p>
		<br>
		<p><i>Sie wollen den Newsletter nicht mehr erhalten? Dann klicken Sie bitte <a href="https://www.fmi-ball.de/api/newsletter.php?token=$token">hier</a></i></p>
	EOF;

	mailto($email, "FMI-Ball Kartenreservierungen", $msg);
}
