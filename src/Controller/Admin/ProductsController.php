<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use App\Form\ProductsFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/produits', name: 'admin_products_')]
class ProductsController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/products/index.html.twig');
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        // on cree un nouveau produit
        $product = new Products();

        // on cree un formulaire
        $productForm = $this->createForm(ProductsFormType::class, $product);

        // on traite la requete du form
        $productForm->handleRequest($request);
        // dd($productForm);

        // on verifie si le form est soumis et valide
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            // on genere le slug
            $slug = $slugger->slug($product->getName());
            $product->setSlug($slug);

            // on arrondi le prix (si en centime)
            $prix = $product->getPrice() * 100;
            $product->setPrice($prix);
            // dd($product);

            $em->persist($product);
            $em->flush();

            // $this->addFlash('success', 'Produit ajouté avec succès');  pas instancié

            // on redirige
            return $this->redirectToRoute('admin_products_index');
        }

        return $this->render('admin/products/add.html.twig', [
            'productForm' => $productForm->createView()
        ]);
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Products $product, Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        // on cree un formulaire
        $productForm = $this->createForm(ProductsFormType::class, $product);

        // on traite la requete du form
        $productForm->handleRequest($request);
        // dd($productForm);

        // on verifie si le form est soumis et valide
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            // on genere le slug
            $slug = $slugger->slug($product->getName());
            $product->setSlug($slug);

            // on arrondi le prix (si en centime)
            $prix = $product->getPrice() * 100;
            $product->setPrice($prix);
            // dd($product);

            $em->persist($product);
            $em->flush();

            // $this->addFlash('success', 'Produit ajouté avec succès');  pas instancié

            // on redirige
            return $this->redirectToRoute('admin_products_index');
        }

        return $this->render('admin/products/edit.html.twig', [
            'productForm' => $productForm->createView()
        ]);
        return $this->render('admin/products/index.html.twig');
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Products $product): Response
    {
        return $this->render('admin/products/index.html.twig');
    }
}
