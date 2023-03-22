<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{


    #[Route('/index-connect', name: 'app_index_connect')]
    public function app_connect(): Response
    {
        $user = "toto";
        if($this->getUser()) {
            $user = $this->getUser()->getUsername();
        }

        return $this->render('auth/index-connect.html.twig', [
            'id' =>  $user,
            'controller_name' => 'AuthController',
        ]);
    }


    #[Route('/sign-in', name: 'app_sign_in')]
    public function app_sign_in(AuthenticationUtils $authenticationUtils): Response
    {

        if($this->getUser()){
            //$user = $this->getUser();
            return $this->redirectToRoute('auth/index-connect.html.twig');

        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('auth/sign-in.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }



    #[Route('/sign-out', name: 'app_sign_out')]
    public function app_sign_out(): Response
    {
        // controller can be blank: it will never be called!
        throw new \RuntimeException('Don\'t forget to activate logout in security.yaml');
    }


}
