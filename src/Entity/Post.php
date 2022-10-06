<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Post extends Entity
{
	#[ORM\Column(length: 191)]
	#[Assert\Length(min: 3)]
	private ?string $title = null;

	#[ORM\Column(type: Types::TEXT)]
	private ?string $message = null;

	#[ORM\Column]
	private ?int $likes = null;

	#[ORM\OneToMany(mappedBy: 'post', targetEntity: Comment::class)]
	private Collection $comments;

	public function __construct()
	{
		$this->likes = 0;
		parent::__construct();
		$this->comments = new ArrayCollection();
	}


	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	public function getMessage(): ?string
	{
		return $this->message;
	}

	public function setMessage(string $message): self
	{
		$this->message = $message;

		return $this;
	}

	public function getLikes(): ?int
	{
		return $this->likes;
	}

	public function setLikes(int $likes): self
	{
		$this->likes = $likes;

		return $this;
	}

	/**
	 * @return Collection<int, Comment>
	 */
	public function getComments(): Collection
	{
		return $this->comments;
	}

	public function addComment(Comment $comment): self
	{
		if (!$this->comments->contains($comment)) {
			$this->comments->add($comment);
			$comment->setPost($this);
		}

		return $this;
	}

	public function removeComment(Comment $comment): self
	{
		if ($this->comments->removeElement($comment)) {
			// set the owning side to null (unless already changed)
			if ($comment->getPost() === $this) {
				$comment->setPost(null);
			}
		}

		return $this;
	}
}
