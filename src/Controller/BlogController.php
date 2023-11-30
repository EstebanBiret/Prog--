<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
<<<<<<< HEAD
use App\Repository\CategoryRepository;
=======
>>>>>>> 0dcd25f1c1443fcd314c95358cd62d717d9dd68f
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
<<<<<<< HEAD
    public function showArticles(ArticleRepository $repoArticle, CategoryRepository $repoCategory): Response {
        $articles = $repoArticle->findAll();
        $categories = $repoCategory->findAll();

        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
            'categories' => $categories
=======
    public function showArticles(ArticleRepository $repoArticle): Response {
        $articles = $repoArticle->findAll();
        // $slug = $repoArticle->getSlug();
        // dd($articles);
        return $this->render('blog/index.html.twig', [
            'articles' => $articles
>>>>>>> 0dcd25f1c1443fcd314c95358cd62d717d9dd68f
        ]);
    }

    #[Route('/blog/article/{slug}', name: 'app_single_article')]
<<<<<<< HEAD
    public function single(ArticleRepository $repoArticle, CategoryRepository $repoCategory, string $slug): Response {
        $article = $repoArticle->findOneBySlug($slug);
        $categories = $repoCategory->findAll();

        return $this->render('blog/single.html.twig', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    #[Route('/blog/category/{slug}', name: 'app_articles_by_category')]
    public function category(CategoryRepository $repoCategory, string $slug) {
        $categories = $repoCategory->findAll();
        $category = $repoCategory->findOneBySlug($slug);
        $articles = [];

        if ($category) {
            $articles = $category->getArticles();
        }

        return $this->render('blog/articles_by_category.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'category' => $category
=======
    public function single(ArticleRepository $repoArticle, string $slug): Response {
        $article = $repoArticle->findOneBySlug($slug);
        return $this->render('blog/single.html.twig', [
            'article' => $article
>>>>>>> 0dcd25f1c1443fcd314c95358cd62d717d9dd68f
        ]);
    }
}
