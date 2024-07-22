<?php

namespace App\Controller;

use App\Entity\Nourriture;
use App\Form\NourritureType;
use App\Repository\NourritureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nourriture')]
#[IsGranted('ROLE_EMPLOYEE')]
class NourritureController extends AbstractController
{
    #[Route('/', name: 'nourriture_index', methods: ['GET'])]
    public function index(NourritureRepository $nourritureRepository): Response
    {
        return $this->render('nourriture/index.html.twig', [
            'nourritures' => $nourritureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'nourriture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nourriture = new Nourriture();
        $form = $this->createForm(NourritureType::class, $nourriture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nourriture);
            $entityManager->flush();

            return $this->redirectToRoute('nourriture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nourriture/new.html.twig', [
            'nourriture' => $nourriture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'nourriture_show', methods: ['GET'])]
    public function show(Nourriture $nourriture): Response
    {
        return $this->render('nourriture/show.html.twig', [
            'nourriture' => $nourriture,
        ]);
    }

    #[Route('/{id}/edit', name: 'nourriture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Nourriture $nourriture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NourritureType::class, $nourriture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('nourriture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nourriture/edit.html.twig', [
            'nourriture' => $nourriture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'nourriture_delete', methods: ['POST'])]
    public function delete(Request $request, Nourriture $nourriture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nourriture->getId(), $request->request->get('_token'))) {
            $entityManager->remove($nourriture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('nourriture_index', [], Response::HTTP_SEE_OTHER);
    }
}
