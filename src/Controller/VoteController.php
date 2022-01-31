<?php

namespace App\Controller;

use App\Entity\Items;
use App\Entity\Users;
use App\Repository\ItemsRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoteController extends AbstractController
{
    private $direction;
    private $userId;
    private $slug;

    /**
     * @Route("/vote/{direction}/{userId}/{slug}", name="app_vote")
     * @param $slug
     * @param $direction
     * @param $userId
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param UsersRepository $usersRepository
     * @return Response
     */
    public function UsersVote($direction, $userId, $slug, Request $request, EntityManagerInterface $entityManager, UsersRepository $usersRepository): Response
    {
        $this->direction = $direction;
        $this->userId = $userId;
        $this->slug = $slug;

        if ($direction === 'up') {
            $usersRepository->find($userId)->voteUp();
        } else {
            $usersRepository->find($userId)->voteDown();
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_showone', ['slug' => $slug]);
    }
}
