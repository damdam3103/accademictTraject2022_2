<?php
include_once __DIR__ . '/Result.php';

class Database
{
	private mysqli $mysqli;
	private string $hostname = 'database';
	private string $username = 'lamp';
	private string $password = 'lamp';
	private string $databse = 'lamp';

	public function __construct()
	{
		$this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->databse);
	}

	public function executeQuery(string $sql, string $types = '' ,mixed ...$vars): Result
	{
		$stmt = $this->mysqli->prepare($sql);
		if (!empty($types)){
			$stmt->bind_param($types, ...$vars);
		}
		$success = $stmt->execute();
		$data = $success ? $stmt->get_result()->fetch_all(MYSQLI_ASSOC) : [];
		return new Result($success, $data);
	}
}