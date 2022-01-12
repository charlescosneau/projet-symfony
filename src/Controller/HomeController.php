<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage(): Response
    {
        return $this->render('home/index.html.twig', []);
    }

    /**
     * @Route("/item/new")
     */
    public function new()
    {

    }
}
