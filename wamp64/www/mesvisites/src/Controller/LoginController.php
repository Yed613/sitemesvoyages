<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * 
     * @Route("/login", name="login")
     */
    public function index(AuthenticationUtils $authenticationUtils): Response
    {   // récup de l'erreur si elle existe
        $error = $authenticationUtils->getLastAuthenticationError();
        // recup du nom de login utilisé
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
    /**
     * @Route("/logout", name = "logout")
     */
    public function logout(){
        
    }
}
