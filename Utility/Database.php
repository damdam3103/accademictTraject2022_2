<?php

namespace Utility;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Database
{
	private Connection $connection;
	private string $hostname = 'database';
	private string $username = 'lamp';
	private string $password = 'lamp';
	private string $database = 'lamp';

	public function __construct()
	{
		$connectionParams = [
			'dbname' => $this->database,
			'user' => $this->username,
			'password' => $this->password,
			'host' => $this->hostname,
			'driver' => 'mysqli',
		];
		$this->connection = DriverManager::getConnection($connectionParams);

	}

	public function getQueryBuilder(): QueryBuilder
	{
		return $this->connection->createQueryBuilder();
	}
}