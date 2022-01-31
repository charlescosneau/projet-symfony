<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnswerController extends AbstractController
{

    /**
     * @Route("/answer", methods="POST", name="app_answer")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param QuestionRepository $questionRepository
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $entityManager, QuestionRepository $questionRepository): Response
    {
        $answer_content = $request->request->get('answer-content');
        $answer_questionId = $request->request->get('answer-questionId');
        $answer_itemsSlug = $request->request->get('answer-ItemsSlug');

        $answer_new = new Answer();
        $answer_new->setContent($answer_content)
            ->setAnswerAt(new \DateTime('now'))
            ->setQuestion($questionRepository->find($answer_questionId))
            ->setUsers($this->getUser());

        $entityManager->persist($answer_new);
        $entityManager->flush();


        return $this->redirectToRoute('app_showone', ['slug' => $answer_itemsSlug]);
    }
}
