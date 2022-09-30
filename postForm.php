<?php
include_once __DIR__ . '/Repository/PostRepository.php';
include_once __DIR__ . '/Entity/Post.php';

if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
	$title = $_POST['title'];
	$message = $_POST['message'];

	$newPost = new Post($title, $message);
	$postRepository = new PostRepository();
	$postRepository->addPost($newPost);
	header("Location: /index.php");
	die();
}