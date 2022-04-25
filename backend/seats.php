<?php

include "cors.php";
include "request.php";
include "database.php";

error_reporting(0);

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

if($_SERVER['REQUEST_METHOD'] === 'GET') {
	$sql = <<<EOF
		SELECT id, IFNULL(occupied_tmp, 0) as occupied
		FROM tables
		LEFT JOIN (
			SELECT COUNT(table_id) as occupied_tmp, table_id
			FROM reservations
			GROUP BY table_id
		) as a
		ON tables.id = a.table_id
	EOF;

	$data = $db->fetchData($sql);

	$result = array();

	while ($row = $data->fetchArray()) {
		$result[$row["id"]] = $row["occupied"];
	}
	
	response($result, 200);
} else {
	$_POST = json_decode(file_get_contents("php://input"), true);

	$required_fields = ["email", "forename", "surname", "salutation"];

	if (!isset($_POST["reservation"])) {
		response("Reservation data is missing", 400);
	}

	if (isset($_POST["information"])) {
		foreach($required_fields as $item) {
			if (!isset($_POST["information"][$item]) || trim($_POST["information"][$item]) == "") {
				response("$item field is required", 400);
			}
		}
	} else {
		response("Information data is missing", 400);
	}

	$email = $_POST["information"]["email"];
	$forename = $_POST["information"]["forename"];
	$surname = $_POST["information"]["surname"];
	$salutation = $_POST["information"]["salutation"];
	
	$sql = <<<EOF
		SELECT *
		FROM user
		WHERE salutation="$salutation" AND forename="$forename" AND surname="$surname" AND email="$email"
	EOF;
	
	$user = $db->fetchFirst($sql);
	
	if(!$user) {
		$sql = <<<EOF
			INSERT INTO user(salutation, forename, surname, email)
			VALUES ("$salutation", "$forename", "$surname", "$email")
		EOF;
	
		$db->run($sql);
	
		$sql = <<<EOF
			SELECT *
			FROM user
			WHERE salutation="$salutation" AND forename="$forename" AND surname="$surname" AND email="$email"
		EOF;
	
		$user = $db->fetchFirst($sql);
	}
	
	$user_id = $user["id"];
	
	function get_occupied_seats($db, $table_id) {
		$sql = <<<EOF
			SELECT count() as seats
			FROM reservations
			WHERE table_id = $table_id
		EOF;
	
		return $db->fetchFirst($sql)["seats"];
	}
	
	function get_free_seats($db, $table_id) {
		$occupied = get_occupied_seats($db, $table_id);
	
		$sql = <<<EOF
			SELECT max_seats
			FROM tables
			WHERE id = $table_id
		EOF;
	
		$max = $db->fetchFirst($sql)["max_seats"];
	
		return $max - $occupied;
	}
	
	foreach($_POST["reservation"] as $table_id => $seats) {
		if(get_free_seats($db, $table_id) < $seats) {
			response("Your requested reservation could not be processed - Please reload page!", 400);
		}
		if($table_id > 30 || $table_id < 0) {
			response("Your tableID is out of bounds - Please try again!", 400);
		}
	}

	$response_string = "";
	$price = 0;
	
	foreach($_POST["reservation"] as $table_id => $seats) {
		for($i = 0; $i < $seats; $i++) {
			$sql = <<<EOF
				INSERT INTO reservations(user_id, table_id)
				VALUES($user_id, $table_id)
			EOF;
	
			$db->run($sql);
		}

		if($table_id == 0) {
			$response_string .= "<li>Stuhlplätze: $seats" . ($seats == 1 ? " Platz" : " Plätze") . "</li>";
		} else {
			$response_string .= "<li>Tisch $table_id: $seats" . ($seats == 1 ? " Platz" : " Plätze") . "</li>";
		}

		if($table_id == 0) {
			$price += 10 * $seats;
		} else if(($table_id >= 16 && $table_id <=19) || ($table_id >= 25 && $table_id <= 28)) {
			$price += 13 * $seats;
		} else {
			$price += 15 * $seats;
		}
	}

	$title = "Hallo ";
	if($salutation == 2) {
		$title = "Sehr geehrte Frau";
	} else if($salutation == 3) {
		$title = "Sehr geehrter Herr";
	}

	$msg = <<<EOF
		<p>
			$title $forename $surname,
		</p>
		<p>
			vielen Dank für Ihre Reservierung.<br>
			Folgende Plätze wurden für Sie reserviert:
		</p>
		<ul>
			$response_string
		</ul>
		<p>Summe: $price €</p>
		<p>
			Sie können Ihre reservierten Karten zu den Verkaufsterminen abholen und bezahlen. Diese werden wir Ihnen rechtzeitig per E-Mail mitteilen.<br>
		</p>
		<p>
			Wir haben für den diesjährigen FMI-Ball eine Kooperation mit <a href="https://www.horbach.de/">Horbach</a>, die es Ihnen ermöglicht, noch einmal Geld zu sparen. Unter dem nachfolgenden Link können Sie ein kurzes, unverbindliches und kostenloses Beratungsgespräch vereinbaren. Nach Beendigung des Gesprächs bekommen Sie von Horbach 10€ des Ticketpreises erstattet.<br>
			Hier der Link zur Terminvereinbarung: {link ist momentan noch nicht verfügbar}<br>
		</p>
		<p>
			Wir freuen uns, Sie beim FMI-Ball am 27.05.2022 begrüßen zu dürfen!
		</p>
		<p>
			Mit besten Grüßen<br>
			<em>Ihr FMI-Ball Team</em><br>
		</p>
	EOF;
	
	mailto($email, "FMI-Ball Kartenreservierung", $msg);
	response("Success", 200);
}

