<?php

if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
	$title = $_POST['title'];
	$message = $_POST['message'];

	$mysqli = new mysqli("database", "lamp", "lamp", "lamp");
//	$sql = "
//	insert into post(title, message)
//	value ('" . $title . "', '" . $message . "')
//";
//	$result = $mysqli->query($sql);
	$sql = "
		insert into post(title, message)
		value (?, ?)
	";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('ss', $title, $message);
	$stmt->execute();
	header("Location: /index.php");
	die();
}