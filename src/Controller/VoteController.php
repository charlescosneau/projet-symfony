<?php

namespace App\Controller;

use App\Entity\Items;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoteController extends AbstractController
{
    /**
     * @Route("/users/{id}/vote", methods="POST", name="app_vote")
     * @return Response
     */
    public function UsersVote(Users $users, Request $request, EntityManagerInterface $entityManager, Items $items): Response
    {
        $direction = $request->request->get('direction');
        if ($direction === 'up') {
            $items->getUsers()->voteUp();
        } else {
            $items->getUsers()->voteDown();
        }

        $entityManager->flush();

        $question = $items->getQuestions();
        return $this->render('home/showOne.html.twig', ['items' => $items]);
    }
}
