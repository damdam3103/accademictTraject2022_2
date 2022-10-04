<?php

use Controllers\PostController;

require_once '../vendor/autoload.php';

$keys = explode('/', $_SERVER['REQUEST_URI']);

if (empty($keys[1])){
	header('Location: /post');
	die();
}

$routes = [
	'post' => PostController::class
];

if (key_exists($keys[1], $routes)) {
	$controller = new $routes[$keys[1]]($keys);
} else {
	include_once '../notFound.php';
}




