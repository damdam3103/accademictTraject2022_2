<?php

class Result
{
	private bool $success;
	private array $data;

	/**
	 * @param bool $success
	 * @param array $data
	 */
	public function __construct(bool $success, array $data)
	{
		$this->success = $success;
		$this->data = $data;
	}

	/**
	 * @return bool
	 */
	public function isSuccess(): bool
	{
		return $this->success;
	}

	/**
	 * @param bool $success
	 */
	public function setSuccess(bool $success): void
	{
		$this->success = $success;
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->data;
	}

	/**
	 * @param array $data
	 */
	public function setData(array $data): void
	{
		$this->data = $data;
	}

}