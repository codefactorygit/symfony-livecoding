<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        $var = array("name"=>"Jone", "age"=> 30);
        $arr = array("serri", "acilio","theo", "irati");

        # dd($arr); // var_dump + die 
        
        return $this->render('test/index.html.twig', [
            "person"=>$var,
            "arrayOfNames"=> $arr
        ]);
    }
}
