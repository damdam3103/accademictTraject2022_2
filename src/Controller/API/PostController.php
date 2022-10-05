<?php

namespace App\Controller\API;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/post', name: 'api_post_')]
class PostController extends AbstractController
{
	private EntityManagerInterface $em;

	public function __construct(EntityManagerInterface $em) {
		$this->em = $em;
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
