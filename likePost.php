<?php
session_start();

$_SESSION['likedIds'] = $_SESSION['likedIds'] ?? [];

$id = intval($_POST['id']);

if (!in_array($id, $_SESSION['likedIds'])) {

	$mysqli = mysqli_connect('database', 'lamp', 'lamp', 'lamp');

	$sql = '
	update post 
	set likes = likes + 1
	where id = ?';

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $_POST['id']);
	if ($stmt->execute()) {
		$_SESSION['likedIds'][] = $id;
		header('Content-Type: application/json');
		echo json_encode(['status' => 'success', 'message' => '']);
	} else {
		header('Content-Type: application/json');
		header('HTTP/1.1 500 Internal Server Error');
		echo json_encode(['status' => 'error', 'message' => 'Like has failed']);
	}
	die();
}
header('Content-Type: application/json');
echo json_encode(['status' => 'success', 'message' => 'Already liked']);
die();
