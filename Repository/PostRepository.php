<?php
include_once __DIR__ . '/../Entity/Post.php';
include_once __DIR__ . '/../Utility/Database.php';

class PostRepository
{

	public function __construct()
	{
	}

	public function getPosts(): bool|array
	{
		$database = new Database();
		$sql = 'select * 
				from post
				order by id desc';
		$result = $database->executeQuery($sql);
		if ($result->isSuccess()) {
			return $this->convertToClasses($result->getData());
		}
		return false;
	}

	public function addPost(Post $post): bool
	{
		$database = new Database();
		$sql = 'insert into post(title, message)
				values (?, ?)';
		$result = $database->executeQuery($sql, 'ss', $post->getTitle(), $post->getMessage());
		return $result->isSuccess();
	}

	private function convertToClasses(array $data): array
	{
		$rd = array();
		foreach ($data as $item) {
			$rd[] = new Post($item['title'], $item['message'], $item['id']);
		}
		return $rd;
	}
}