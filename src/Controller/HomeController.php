<?php

namespace App\Controller;

use App\Entity\Items;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ItemsRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @param ItemsRepository $itemsRepository
     * @return Response
     */
    public function homepage(ItemsRepository $itemsRepository): Response
    {
        $items = $itemsRepository->findAllOrderByNewest();
        return $this->render('home/index.html.twig', ["items" => $items]);
    }

    /**
     * @Route("/question/{slug}", name="app_showone")
     * @param Items $items
     * @return Response
     */
    public function showOne(Items $items): Response
    {
//        if (!$question) {
//            throw $this->createNotFoundException('un message d\'erreur');
//        }

        return $this->render('home/showOne.html.twig', ['items' => $items]);
    }
}
