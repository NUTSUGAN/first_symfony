<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'article_list')]
    public function list(): Response
    {
        return $this->render('articles/list.html.twig');
    }

    #[Route('/new', name: 'article_new')]
    public function new(): Response
    {
        return $this->render('articles/list.html.twig');
    }

    #[Route('/{id}', name: 'article_update')]
    public function update(): Response
    {
        return $this->render('articles/list.html.twig');
    }

    #[Route('/{id}', name: 'article_delete')]
    public function delete(): Response
    {
        return $this->render('articles/list.html.twig');
    }
}
