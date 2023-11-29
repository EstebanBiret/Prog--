<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController {
    #[Route('/blog/{id}/{name}', name: 'app_blog', requirements: ["name"=>"[a-zA-Z]{5,50}", "id"=> "[0-9]{2,6}"])]
    public function index(int $id, string $name): Response {
        return $this->render('blog/index.html.twig', [
            'id' => $id,
            'name' => $name,
        ]);
    }

    #[Route('/', name: 'app_base')]
    public function base(): Response {
        return new Response('Hello World ! \(0o0)/');
    }

    #[Route('/blog/articles', name: 'app_blog_articles')]
    public function showArticles(ArticleRepository $repoArticle): Response {
        $articles = $repoArticle->findAll();
        // $slug = $repoArticle->getSlug();
        // dd($articles);
        return $this->render('blog/index.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/blog/article/{slug}', name: 'app_single_article')]
    public function single(ArticleRepository $repoArticle, string $slug): Response {
        $article = $repoArticle->findOneBySlug($slug);
        return $this->render('blog/single.html.twig', [
            'article' => $article
        ]);
    }
}
