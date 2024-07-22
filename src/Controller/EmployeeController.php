<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Nourriture;
use App\Form\NourritureType;
use App\Repository\AvisRepository;
use App\Repository\AnimalRepository;
use App\Repository\NourritureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employee')]
class EmployeeController extends AbstractController
{
    #[Route('/home', name: 'employee_home')]
    public function index(AvisRepository $avisRepository): Response
    {
        $avisList = $avisRepository->findAll();
        return $this->render('employee/home.html.twig', [
            'controller_name' => 'EmployeeController',
            'avisList' => $avisList,
        ]);
    }

    #[Route('/manage-reviews', name: 'employee_manage_reviews')]
    public function manageReviews(AvisRepository $avisRepository): Response
    {
        $avisList = $avisRepository->findBy(['isApproved' => false]);

        return $this->render('employee/manage_reviews.html.twig', [
            'avisList' => $avisList,
        ]);
    }

    #[Route('/manage-reviews/{id}/approve', name: 'employee_approve_review', methods: ['POST'])]
    public function approveReview(Request $request, Avis $avis, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('approve'.$avis->getId(), $request->request->get('_token'))) {
            $avis->setIsApproved(true);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employee_manage_reviews');
    }

    #[Route('/manage-food', name: 'employee_manage_food')]
    public function manageFood(AnimalRepository $animalRepository, NourritureRepository $nourritureRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $animals = $animalRepository->findAll();
        $nourritures = $nourritureRepository->findAll();
        $nourriture = new Nourriture();
        $form = $this->createForm(NourritureType::class, $nourriture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nourriture);
            $entityManager->flush();

            return $this->redirectToRoute('employee_manage_food');
        }

        return $this->render('employee/manage_food.html.twig', [
            'animals' => $animals,
            'nourritures' => $nourritures,
            'form' => $form->createView(),
        ]);
    }
}
