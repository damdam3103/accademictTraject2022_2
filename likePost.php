<?php

$mysqli = mysqli_connect('database', 'lamp', 'lamp', 'lamp');

$sql = '
	update post 
	set likes = likes + 1
	where id = ?';

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $_POST['id']);
if ($stmt->execute()){
	header('Content-Type: application/json');
	echo json_encode(['status' => 'success', 'message' => '']);
	die();
}else{
	header('Content-Type: application/json');
	header('HTTP/1.1 500 Internal Server Error');
	echo json_encode(['status' => 'error', 'message' => 'Like has failed']);
	die();
}



