<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserInformationRepository;
use \Symfony\Bundle\SecurityBundle\Security;


class IndexController extends AbstractController 
{ 
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(UserInformationRepository $userInformationRepository): Response
    {
        $user = $this->security->getUser();

         if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $userInformations = $userInformationRepository->findBy(['user' => $user]);

        return $this->render('dashboard.html.twig', [
            'user_informations' => $userInformations,
        ]);
    }
}


