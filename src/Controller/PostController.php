<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/post', name: 'post_')]
class PostController extends AbstractController
{
	private PostRepository $pr;
	public function __construct(PostRepository $pr)
	{
		$this->pr = $pr;
	}

	#[Route('/', name: 'list')]
    public function index(): Response
    {
		$posts = $this->pr->findAll();

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
			'posts' => $posts
        ]);
    }

	#[Route('/{id}', name: 'details')]
	public function postDetails(Request $request, Post $post) : Response {
		return $this->render('post\details.html.twig', [
			'post'=> $post
		]);
	}

}
