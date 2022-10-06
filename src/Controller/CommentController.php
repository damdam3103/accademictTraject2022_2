<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comment', name: 'comment_')]
class CommentController extends AbstractController
{
	private EntityManagerInterface $em;

	public function __construct(EntityManagerInterface $em) {
		$this->em = $em;
	}

    #[Route('/', name: 'add')]
    public function index(Request $request): Response
    {
		$form = $this->createForm(CommentType::class);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
			/** @var Comment $comment */
			$comment = $form->getData();
			try {
				$this->em->persist($comment);
				$this->em->flush();
				return $this->redirectToRoute('post_list');
			} catch (\Exception $e) {
				throw new \Exception($e->getMessage());
			}
		}

        return $this->render('comment/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
