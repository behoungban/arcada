<?php

namespace App\Controller;

use App\Entity\EtatAnimal;
use App\Form\EtatAnimalType;
use App\Repository\EtatAnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/etat_animal')]
class EtatAnimalController extends AbstractController
{
    #[Route('/', name: 'etat_animal_index', methods: ['GET'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function index(EtatAnimalRepository $etatAnimalRepository): Response
    {
        return $this->render('employee/etat_animal/index.html.twig', [
            'etat_animals' => $etatAnimalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'etat_animal_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $etatAnimal = new EtatAnimal();
        $form = $this->createForm(EtatAnimalType::class, $etatAnimal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($etatAnimal);
            $entityManager->flush();

            return $this->redirectToRoute('etat_animal_index');
        }

        return $this->renderForm('employee/etat_animal/new.html.twig', [
            'etat_animal' => $etatAnimal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'etat_animal_show', methods: ['GET'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function show(EtatAnimal $etatAnimal): Response
    {
        return $this->render('employee/etat_animal/show.html.twig', [
            'etat_animal' => $etatAnimal,
        ]);
    }

    #[Route('/{id}/edit', name: 'etat_animal_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function edit(Request $request, EtatAnimal $etatAnimal, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EtatAnimalType::class, $etatAnimal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('etat_animal_index');
        }

        return $this->renderForm('employee/etat_animal/edit.html.twig', [
            'etat_animal' => $etatAnimal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'etat_animal_delete', methods: ['POST'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function delete(Request $request, EtatAnimal $etatAnimal, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatAnimal->getId(), $request->request->get('_token'))) {
            $entityManager->remove($etatAnimal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('etat_animal_index');
    }
}
