<?php

namespace App\Controller;

use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
    #[Route('/{slug}', name: 'list')]
    public function details(Categories $category): Response
    {
        // liste des prods de la categorie
        $products = $category->getProducts();

        return $this->render(
            'categories/list.html.twig',
            compact('category', 'products') // autre syntaxe possible pour compact 
        );
    }
}
