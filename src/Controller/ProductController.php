<?php

namespace App\Controller;


use App\Entity\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/create", name="product_create")
     */
    public function createAction(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName("test 2");
        $product->setPrice(50);
        $product->setPicture("https://cdn.pixabay.com/photo/2020/02/05/13/02/waterfalls-4821153__340.jpg");
        $em->persist($product);
        $em->flush(); // insert into product (name, price, picture) VALUES ("keyboard",....)
        return new Response("Record created with id: ".$product->getId() . "<br><img src='".$product->getPicture()."'>");
    }

    /**
     * @Route("/", name="products")
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        # dd($products);
        return $this->render('product/index.html.twig', [
            "allTheProducts" => $products
        ]);
    }

    /**
     * @Route("/details/{id}", name="product_details")
     */
    public function detailsAction($id): Response
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        # dd($product);
        return $this->render('product/details.html.twig', [
            "test" => $product
        ]);
    }
}
