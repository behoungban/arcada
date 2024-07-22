<?php

namespace App\Controller;

use App\Entity\OpeningHours;
use App\Form\OpeningHoursType;
use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/opening_hours')]
class OpeningHoursController extends AbstractController
{
    #[Route('/', name: 'opening_hours_index', methods: ['GET'])]
    public function index(OpeningHoursRepository $openingHoursRepository): Response
    {
        $openingHours = $openingHoursRepository->findAll();
        $template = 'opening_hours/index.html.twig';

        if ($this->isGranted('ROLE_ADMIN')) {
            $template = 'admin/opening_hours/index.html.twig';
        }

        return $this->render($template, [
            'opening_hours' => $openingHours,
        ]);
    }

    #[Route('/new', name: 'admin_opening_hours_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $openingHours = new OpeningHours();
        $form = $this->createForm(OpeningHoursType::class, $openingHours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($openingHours);
            $entityManager->flush();

            return $this->redirectToRoute('admin_opening_hours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/opening_hours/new.html.twig', [
            'opening_hour' => $openingHours,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_opening_hours_show', methods: ['GET'])]
    public function show(OpeningHours $openingHours): Response
    {
        return $this->render('admin/opening_hours/show.html.twig', [
            'opening_hour' => $openingHours,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_opening_hours_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OpeningHours $openingHours, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OpeningHoursType::class, $openingHours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_opening_hours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/opening_hours/edit.html.twig', [
            'opening_hour' => $openingHours,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_opening_hours_delete', methods: ['POST'])]
    public function delete(Request $request, OpeningHours $openingHours, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$openingHours->getId(), $request->request->get('_token'))) {
            $entityManager->remove($openingHours);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_opening_hours_index', [], Response::HTTP_SEE_OTHER);
    }
}
