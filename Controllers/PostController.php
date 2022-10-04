<?php

namespace Controllers;

class PostController
{

	public function __construct($fullKeys)
	{
		$homeRoutes = [
			'add' => fn() => $this->addPost(),
			'create' => fn() => $this->formPost(),
		];
		if (isset($fullKeys[2])) {
			if (key_exists($fullKeys[2], $homeRoutes)) {
				$homeRoutes[$fullKeys[2]]();
			} else {
				$this->showPostList();
			}
		}else{
			$this->showPostList();
		}
	}

	public function showPostList(): void
	{
		include_once __DIR__ . '/../post.php';
	}

	public function addPost(): void
	{
		include_once __DIR__ . '/../addPostForm.php';
	}

	public function formPost(): void
	{
		include_once __DIR__ . '/../createPost.php';
	}

}
