<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog/{id}/{name}', name: 'app_blog', requirements: ["name"=>"[a-zA-Z]{5,50}", "id"=> "[0-9]{2,6}"])]
    public function index(int $id, string $name): Response
    {
        return $this->render('blog/index.html.twig', [
            'id' => $id,
            'name' => $name,
        ]);
    }

    //Exercice 1
    #[Route('/', name: 'app_base')]
    public function base(): Response
    {
        return new Response('Hello World ! \(0o0)/');
    }
}
