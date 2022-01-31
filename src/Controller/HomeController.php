<?php

namespace App\Controller;

use App\Entity\Items;
use App\Entity\Users;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ItemsRepository;
use App\Classe\Search;
use App\Form\SearchType;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @param Request $request
     * @param ItemsRepository $itemsRepository
     * @return Response
     */
    public function homepage(Request $request, ItemsRepository $itemsRepository): Response
    {
        if ($request->request->get('search')) {
            $filter = $request->request->get('search');
            $items = $itemsRepository->findBy(array('tag' =>$filter), array('publishedAt' => 'DESC'));
        } else {
            $items = $itemsRepository->findAllOrderByNewest();
        }

        return $this->render('home/index.html.twig', [
            "items" => $items,
        ]);
    }

    /**
     * @Route("/items/{slug}", name="app_showone")
     * @param Items $items
     * @return Response
     */
    public function showOne(Items $items): Response
    {
        $question = $items->getQuestions();
        return $this->render('home/showOne.html.twig', ['items' => $items]);
    }
}
