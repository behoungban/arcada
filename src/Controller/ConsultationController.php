<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Form\ConsultationType;
use App\Repository\ConsultationRepository;
use App\Repository\NourritureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/veterinaire')]
class ConsultationController extends AbstractController
{
    #[Route('/consultations', name: 'consultation_index', methods: ['GET'])]
    #[IsGranted('ROLE_VET')]
    public function index(ConsultationRepository $consultationRepository): Response
    {
        return $this->render('veterinaire/consultation/index.html.twig', [
            'consultations' => $consultationRepository->findAll(),
        ]);
    }

    #[Route('/consultations/new', name: 'consultation_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_VET')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $consultation = new Consultation();
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($consultation);
            $entityManager->flush();

            return $this->redirectToRoute('consultation_index');
        }

        return $this->render('veterinaire/consultation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/consultations/{id}', name: 'consultation_show', methods: ['GET'])]
    #[IsGranted('ROLE_VET')]
    public function show(Consultation $consultation, NourritureRepository $nourritureRepository): Response
    {
        $nourritures = $nourritureRepository->findBy(['animal' => $consultation->getAnimal()]);

        return $this->render('veterinaire/consultation/show.html.twig', [
            'consultation' => $consultation,
            'nourritures' => $nourritures,
        ]);
    }

    #[Route('/consultations/{id}/edit', name: 'consultation_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_VET')]
    public function edit(Request $request, Consultation $consultation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('consultation_index');
        }

        return $this->render('veterinaire/consultation/edit.html.twig', [
            'form' => $form->createView(),
            'consultation' => $consultation,
        ]);
    }

    #[Route('/consultations/{id}', name: 'consultation_delete', methods: ['POST'])]
    #[IsGranted('ROLE_VET')]
    public function delete(Request $request, Consultation $consultation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consultation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($consultation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('consultation_index');
    }
}
