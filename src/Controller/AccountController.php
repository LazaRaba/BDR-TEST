<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\AssMatRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


//----------------------------------------------------------------
class AccountController extends AbstractController

{

    // Inject the security service
    public function __construct(private Security $security){
        $this->security = $security;
    }
    
    #[Route('/account', name: 'app_account')]
    
    public function index(): Response
    {
        $user = $this->security->getUser(); // Récupération de l'utilisateur connecté
        $assmat = $user->getAssmat(); // Récupération de l'objet AssMat correspondant

        return $this->render('account/index.html.twig', [
            'user' => $user,
            'assmat' => $assmat,
        ]);
    }
}
