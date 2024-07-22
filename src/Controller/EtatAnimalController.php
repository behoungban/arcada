<?php

namespace App\Controller;

use App\Entity\EtatAnimal;
use App\Form\EtatAnimalType;
use App\Repository\EtatAnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/etat/animal')]
class EtatAnimalController extends AbstractController
{
    #[Route('/', name: 'app_etat_animal_index', methods: ['GET'])]
    public function index(EtatAnimalRepository $etatAnimalRepository): Response
    {
        return $this->render('etat_animal/index.html.twig', [
            'etat_animals' => $etatAnimalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etat_animal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $etatAnimal = new EtatAnimal();
        $form = $this->createForm(EtatAnimalType::class, $etatAnimal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($etatAnimal);
            $entityManager->flush();

            return $this->redirectToRoute('app_etat_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etat_animal/new.html.twig', [
            'etat_animal' => $etatAnimal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_animal_show', methods: ['GET'])]
    public function show(EtatAnimal $etatAnimal): Response
    {
        return $this->render('etat_animal/show.html.twig', [
            'etat_animal' => $etatAnimal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etat_animal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtatAnimal $etatAnimal, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EtatAnimalType::class, $etatAnimal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_etat_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etat_animal/edit.html.twig', [
            'etat_animal' => $etatAnimal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_animal_delete', methods: ['POST'])]
    public function delete(Request $request, EtatAnimal $etatAnimal, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatAnimal->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($etatAnimal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_etat_animal_index', [], Response::HTTP_SEE_OTHER);
    }
}
