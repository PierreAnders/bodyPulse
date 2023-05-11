<?php

namespace App\Controller;

use App\Entity\UserInformation;
use App\Form\UserInformationType;
use App\Repository\UserInformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Bundle\SecurityBundle\Security;

#[Route('/user/information')]
class UserInformationController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/', name: 'app_user_information_index', methods: ['GET'])]
    public function index(UserInformationRepository $userInformationRepository): Response
    {
        $user = $this->security->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $userInformations = $userInformationRepository->findBy(['user' => $user]);

        return $this->render('user_information/index.html.twig', [
            'user_informations' => $userInformations,
        ]);
    }

    #[Route('/new', name: 'app_user_information_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserInformationRepository $userInformationRepository): Response
    {
        $user = $this->security->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException('User must be logged in.');
        }

        $userInformation = new UserInformation();
        $userInformation->setUser($user);

        $form = $this->createForm(UserInformationType::class, $userInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userInformation->calculateBmi();
            $userInformationRepository->save($userInformation, true);

            return $this->redirectToRoute('app_user_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user_information/new.html.twig', [
            'user_information' => $userInformation,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_user_information_show', methods: ['GET'])]
    public function show(UserInformation $userInformation): Response
    {
        return $this->render('user_information/show.html.twig', [
            'user_information' => $userInformation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_information_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UserInformation $userInformation, UserInformationRepository $userInformationRepository): Response
    {
        $form = $this->createForm(UserInformationType::class, $userInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userInformation->calculateBmi();
            $userInformationRepository->save($userInformation, true);

            return $this->redirectToRoute('app_user_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user_information/edit.html.twig', [
            'user_information' => $userInformation,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_user_information_delete', methods: ['POST'])]
    public function delete(Request $request, UserInformation $userInformation, UserInformationRepository $userInformationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $userInformation->getId(), $request->request->get('_token'))) {
            $userInformationRepository->remove($userInformation, true);
        }
        return $this->redirectToRoute('app_user_information_index', [], Response::HTTP_SEE_OTHER);
    }
}
