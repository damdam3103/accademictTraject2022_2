<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class Entity
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	protected ?int $id;

	#[ORM\Column(type: "datetime", options: ['default' => "CURRENT_TIMESTAMP"])]
	protected  ?\DateTime $created;


	#[ORM\Column(type: "datetime", options: ['default' => "CURRENT_TIMESTAMP"])]
	protected ?\DateTime $modified;

	// When creating a field service case, a couple properties need to be filled in automatically
	public function __construct()
	{
		$this->setCreated(new \DateTime());
		if ($this->getModified() == null) {
			$this->setModified(new \DateTime());
		}
	}

	// By adding this annotation, this function will be called before any persist or update
	// it is to update the modified time
	#[ORM\PrePersist]
	#[ORM\PreUpdate]
	public function updateModifiedDatetime()
	{
		// update the modified time
		$this->setModified(new \DateTime());
	}

	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @param int|null $id
	 */
	public function setId(?int $id): void
	{
		$this->id = $id;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getCreated(): ?\DateTime
	{
		return $this->created;
	}

	/**
	 * @param \DateTime|null $created
	 */
	public function setCreated(?\DateTime $created): void
	{
		$this->created = $created;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getModified(): ?\DateTime
	{
		return $this->modified;
	}

	/**
	 * @param \DateTime|null $modified
	 */
	public function setModified(?\DateTime $modified): void
	{
		$this->modified = $modified;
	}



}