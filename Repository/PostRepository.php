<?php
namespace Repository;

use Doctrine\DBAL\Exception;
use Entity\Post;
use Utility\Database;

class PostRepository
{

	public function __construct()
	{
	}

	public function getPosts(): bool|array
	{
		$database = new Database();
		$queryBuilder = $database->getQueryBuilder();

		try {
			$result = $queryBuilder
				->select('*')
				->from('post')
				->orderBy('id', 'desc')
				->fetchAllAssociative();
			return $this->convertToClasses($result);
		} catch (Exception $e) {
			return false;
		}

	}

	public function addPost(Post $post): bool
	{
		$database = new Database();
		$queryBuilder = $database->getQueryBuilder();
		$affectedRows = $queryBuilder
			->insert('post')
			->values(
				[
					'title' => '?',
					'message' => '?',
				]
			)
			->setParameter(0, $post->getTitle())
			->setParameter(1, $post->getMessage())
			->executeStatement();

		return $affectedRows > 0;
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