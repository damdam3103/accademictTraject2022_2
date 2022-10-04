<?php

use Entity\Post;
use Repository\PostRepository;

require_once 'vendor/autoload.php';

if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
	$title = $_POST['title'];
	$message = $_POST['message'];

	$newPost = new Post($title, $message);
	$postRepository = new PostRepository();
	$postRepository->addPost($newPost);

	header('Location: /post');
	die();
}