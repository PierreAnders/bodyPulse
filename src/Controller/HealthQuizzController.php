<?php

namespace App\Controller;

use App\Entity\HealthQuizz;
use App\Form\HealthQuizzType;
use App\Repository\HealthQuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Bundle\SecurityBundle\Security;


#[Route('/health/quizz')]
class HealthQuizzController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/', name: 'app_health_quizz_index', methods: ['GET'])]
    public function index(HealthQuizzRepository $healthQuizzRepository): Response
    {

        $user = $this->security->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $firstHealthQuizz = $healthQuizzRepository->findBy(['user' => $user]);

        $firstHealthScore = null;
        if (!empty($firstHealthQuizz)) {
            $firstHealthScore = $firstHealthQuizz[0]->getHealthScore();
        }

        return $this->render('health_quizz/index.html.twig', [
            'health_quizzs' => $firstHealthQuizz,
            'first_health_score' => $firstHealthScore,
        ]);
    }

    #[Route('/new', name: 'app_health_quizz_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HealthQuizzRepository $healthQuizzRepository): Response
    {

        $user = $this->security->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException('User must be logged in.');
        }

        $healthQuizz = new HealthQuizz();
        $healthQuizz->setUser($user);

        $form = $this->createForm(HealthQuizzType::class, $healthQuizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $healthQuizzRepository->save($healthQuizz, true);

            return $this->redirectToRoute('app_health_quizz_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('health_quizz/new.html.twig', [
            'health_quizz' => $healthQuizz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_health_quizz_show', methods: ['GET'])]
    public function show(HealthQuizz $healthQuizz): Response
    {
        return $this->render('health_quizz/show.html.twig', [
            'health_quizz' => $healthQuizz,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_health_quizz_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, HealthQuizz $healthQuizz, HealthQuizzRepository $healthQuizzRepository): Response
    {
        $form = $this->createForm(HealthQuizzType::class, $healthQuizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $healthQuizzRepository->save($healthQuizz, true);

            return $this->redirectToRoute('app_health_quizz_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('health_quizz/edit.html.twig', [
            'health_quizz' => $healthQuizz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_health_quizz_delete', methods: ['POST'])]
    public function delete(Request $request, HealthQuizz $healthQuizz, HealthQuizzRepository $healthQuizzRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $healthQuizz->getId(), $request->request->get('_token'))) {
            $healthQuizzRepository->remove($healthQuizz, true);
        }

        return $this->redirectToRoute('app_health_quizz_index', [], Response::HTTP_SEE_OTHER);
    }
}
