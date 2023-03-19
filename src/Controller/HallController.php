<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Form\ConcertType;
use App\Repository\HallRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HallController extends AbstractController{
    /**
     * @return Response
     */
    #[Route('/hall', name: 'hall')]
    public function index(): Response
    {
        return $this->render('hall/list.html.twig', [
            'controller_name' => 'HallController',
        ]);
    }

    #[Route('/hall/{id}', name: 'hall_show')]
    public function list(int $id, HallRepository $hallRepository): Response
    {
        return $this->render('hall/hall.html.twig', [
                'band' => $hallRepository->find($id)
            ]
        );
    }
}