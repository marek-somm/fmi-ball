<?php

include "cors.php";
include "request.php";
include "database.php";
include "log.php";

function mailto($email, $subject, $message) {
	$from = "FMI-Ball <info@fmi-ball.de>";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= "From:" . $from . "\r\n";

	mail($email, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
}

$db = new Database();
if (!$db) {
	response($db->lastErrorMsg(), 500);
}

$log = new Log();

if (isset($_GET["token"])) {
	$token = $_GET["token"];

	$sql = <<<EOF
		SELECT email
		FROM newsletter
		WHERE token = "$token"
	EOF;

	$email = $db->fetchFirst($sql)["email"];

	$sql = <<<EOF
		DELETE FROM newsletter
		WHERE token = "$token"
	EOF;
	$ret = $db->exec($sql);

	if (!$ret) {
		echo ("Leider ist etwas schief gegangen, bitte kontaktieren sie den webmaster (webmaster@fmi-ball.de).");
	} else {
		echo ("Erfolgreich abgemeldet.");
		$log->append("[DELETE] $email");
	}
	$db->close();
	die();
}

if (isset($_GET["ref"])) {
	$ref = $_GET["ref"];

	$sql = <<<EOF
		SELECT email
		FROM validTokens
		WHERE token="$ref"
	EOF;

	$email = $db->fetchFirst($sql)["email"];

	if ($email) {
		$time = time();
		$token = md5(uniqid(time(), TRUE));

		$sql = <<<EOF
			INSERT INTO Newsletter (email, token, created_at)
			VALUES ('$email', '$token', $time);
		EOF;

		$ret = $db->exec($sql);
		if (!$ret) {
			echo ("Leider ist etwas schief gegangen, bitte kontaktieren sie den webmaster (webmaster@fmi-ball.de).");
		} else {
			$sql = <<<EOF
				DELETE FROM validTokens
				WHERE token = '$ref' OR email = '$email'
			EOF;

			$ret = $db->exec($sql);

			echo ("Sie haben sich erfolgreich zum Newsletter angemeldet.");

			$msg = '
			<html>
			<head>
				<title>FMI-Ball Newsletter Anmeldebestätigung</title>
			</head>
			<body>
				<p>Hallo,</p>
				<p>Sie haben sich erfolgreich für unseren Newsletter angemeldet!<br />
				Um sich von diesem wieder abzumelden, klicken sie bitte <a href="https://www.fmi-ball.de/api/newsletter.php?token=' . $token . '">hier</a>.</p>
				<p>Liebe Grüße</p>
				<p><i>Das Team des FMI-Balls</i></p>
			</body>
			</html>
			';
			mailto($email, "FMI-Ball Newsletter Anmeldebestätigung", $msg);
			$log->append("[ADD] $email");
		}
		$db->close();
		die();
	} else {
		header('Location: //www.fmi-ball.de');
		die();
	}
}

$_POST = json_decode(file_get_contents("php://input"), true);

if (!isset($_POST["email"])) {
	$db->close();
	response("Email is required!", 400);
}

$email = $_POST["email"];
$time = time();
$token = md5(uniqid(time(), TRUE));

$sql = <<<EOF
	SELECT 1
	FROM Newsletter
	WHERE email='$email'
EOF;

$email_is_present = $db->fetchFirst($sql);

$sql = <<<EOF
	SELECT 1
	FROM validTokens
	WHERE token='$token'
EOF;

$token_is_present = $db->fetchFirst($sql);

if ($email_is_present || $token_is_present) {
	$db->close();
	response("Success", 200);
} else {
	$sql = <<<EOF
		INSERT INTO validTokens (email, token, created_at)
		VALUES ('$email', '$token', $time);
	EOF;
	$ret = $db->exec($sql);

	$msg = '
	<html>
	<head>
		<title>FMI-Ball Newsletter Anmeldebestätigung</title>
	</head>
	<body>
		<p>Hallo,</p>
		<p>wir freuen uns das Sie sich für unseren Newsletter interessieren.<br />
		Bitte klicken Sie <a href="https://www.fmi-ball.de/api/newsletter.php?ref=' . $token . '">hier</a> 
		um den Anmeldeprozess zu vervollständigen.<br />
		Sie können sich jederzeit wieder abmelden.
		</p>
		<p>Liebe Grüße</p>
		<p><i>Das Team des FMI-Balls</i></p>
	</body>
	</html>
	';
	mailto($email, "FMI-Ball Newsletter Anmeldebestätigung", $msg);
	$log->append("[NEW] $email");
	$db->close();
	response("Success", 200);
}
