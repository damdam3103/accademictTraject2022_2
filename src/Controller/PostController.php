<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/post', name: 'post_')]
class PostController extends AbstractController
{
	private PostRepository $pr;
	private EntityManagerInterface $em;
	public function __construct(PostRepository $pr, EntityManagerInterface $em)
	{
		$this->pr = $pr;
		$this->em = $em;
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

	#[Route('/create', name: 'create')]
	public function addPost(Request $request): Response {
		$form = $this->createForm(PostType::class);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
			/** @var Post $post */
			$post = $form->getData();

			$this->em->persist($post);
			$this->em->flush();

			return $this->redirectToRoute("post_list");
		}

		return $this->render('post\form.html.twig', [
			'form'=> $form->createView()
		]);

	}

	#[Route('/{id}', name: 'details')]
	public function postDetails(Request $request, Post $post) : Response {
		return $this->render('post\details.html.twig', [
			'post'=> $post
		]);
	}

	#[Route('/edit/{id}', name: 'edit')]
	public function editPost(Request $request, Post $post): Response {
		$form = $this->createForm(PostType::class, $post);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
			$post = $form->getData();

			$this->em->persist($post);
			$this->em->flush();

			return $this->redirectToRoute("post_list");
		}

		return $this->render('post\form.html.twig', [
			'form'=> $form->createView()
		]);

	}



}
