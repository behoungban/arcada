<?php

namespace App\Controller;

use App\Entity\CommentaireHabitat;
use App\Form\CommentaireHabitatType;
use App\Repository\CommentaireHabitatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/commentaire/habitat')]
class CommentaireHabitatController extends AbstractController
{
    #[Route('/', name: 'app_commentaire_habitat_index', methods: ['GET'])]
    public function index(CommentaireHabitatRepository $commentaireHabitatRepository): Response
    {
        return $this->render('commentaire_habitat/index.html.twig', [
            'commentaire_habitats' => $commentaireHabitatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_commentaire_habitat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commentaireHabitat = new CommentaireHabitat();
        $form = $this->createForm(CommentaireHabitatType::class, $commentaireHabitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentaireHabitat);
            $entityManager->flush();

            return $this->redirectToRoute('app_commentaire_habitat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaire_habitat/new.html.twig', [
            'commentaire_habitat' => $commentaireHabitat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commentaire_habitat_show', methods: ['GET'])]
    public function show(CommentaireHabitat $commentaireHabitat): Response
    {
        return $this->render('commentaire_habitat/show.html.twig', [
            'commentaire_habitat' => $commentaireHabitat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commentaire_habitat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommentaireHabitat $commentaireHabitat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommentaireHabitatType::class, $commentaireHabitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_commentaire_habitat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaire_habitat/edit.html.twig', [
            'commentaire_habitat' => $commentaireHabitat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commentaire_habitat_delete', methods: ['POST'])]
    public function delete(Request $request, CommentaireHabitat $commentaireHabitat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentaireHabitat->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($commentaireHabitat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_commentaire_habitat_index', [], Response::HTTP_SEE_OTHER);
    }
}
