<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(CategoriesRepository $categoriesrepository): Response
    {
        return $this->render('main/index.html.twig', [
            'categories' => $categoriesrepository->findBy([],
            ['categoryOrder' => 'asc'])
        ]);
    }
}
