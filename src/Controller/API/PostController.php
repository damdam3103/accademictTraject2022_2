<?php

namespace App\Controller\API;

use App\Entity\Comment;
use App\Entity\Post;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/post', name: 'api_post_')]
class PostController extends AbstractController
{
	private EntityManagerInterface $em;
	/** @var PostRepository $pr */
	private $pr;
	/** @var CommentRepository $cr */
	private $cr;

	public function __construct(EntityManagerInterface $em) {
		$this->em = $em;
		$this->pr = $em->getRepository(Post::class);
		$this->cr = $em->getRepository(Comment::class);
	}

	#[Route('/', name: 'posts')]
	public function getPosts(): Response {
		$posts = $this->pr->findAll();

		return $this->json($posts, Response::HTTP_OK, [], ['groups' => ['default']]);
	}

	#[Route('/comments', name: 'comments')]
	public function getComments(): Response {
		$comments = $this->cr->findAll();

		return $this->json($comments, Response::HTTP_OK, [], ['groups' => ['default']]);
	}

    #[Route('/likes', name: 'likes', methods: 'POST')]
    public function index(Request $request): Response
    {
		/** @var Post $post */
		$post = $this->em->getRepository(Post::class)->find($request->get('id'));

		$post->setLikes($post->getLikes() + 1);

		try {
			$this->em->persist($post);
			$this->em->flush();
			return $this->json(['message' => 'Object saved'], Response::HTTP_OK);
		} catch (\Exception $e) {
			return $this->json(['message' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
		}
    }


}
