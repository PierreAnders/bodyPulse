<?php

namespace App\Controller;

use App\Entity\HealthQuizz;
use App\Form\HealthQuizzType;
use App\Repository\HealthQuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/health/quizz')]
class HealthQuizzController extends AbstractController
{
    #[Route('/', name: 'app_health_quizz_index', methods: ['GET'])]
    public function index(HealthQuizzRepository $healthQuizzRepository): Response
{
    $firstHealthQuizz = $healthQuizzRepository->findOneBy([]);
    $firstHealthScore = null;
    
    if ($firstHealthQuizz) {
        $firstHealthScore = $firstHealthQuizz->getHealthScore();
    }

    return $this->render('health_quizz/index.html.twig', [
        'health_quizzs' => $healthQuizzRepository->findAll(),
        'first_health_score' => $firstHealthScore,
    ]);
}

    #[Route('/new', name: 'app_health_quizz_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HealthQuizzRepository $healthQuizzRepository): Response
    {
        $healthQuizz = new HealthQuizz();
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
        if ($this->isCsrfTokenValid('delete'.$healthQuizz->getId(), $request->request->get('_token'))) {
            $healthQuizzRepository->remove($healthQuizz, true);
        }

        return $this->redirectToRoute('app_health_quizz_index', [], Response::HTTP_SEE_OTHER);
    }
}
