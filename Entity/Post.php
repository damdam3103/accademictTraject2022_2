<?php
namespace Entity;

class Post
{
	private int|null $id;
	private string $title;
	private string $message;

	/**
	 * @param string $title
	 * @param string $message
	 * @param int|null $id
	 */
	public function __construct(string $title, string $message, int|null $id = null)
	{
		$this->title = $title;
		$this->message = $message;
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getMessage(): string
	{
		return $this->message;
	}

	/**
	 * @param string $message
	 */
	public function setMessage(string $message): void
	{
		$this->message = $message;
	}

}