<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HabitatRepository;
use App\Repository\ServiceRepository;
use App\Repository\AvisRepository;
use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Avis;
use App\Form\AvisType;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        HabitatRepository $habitatRepository, 
        ServiceRepository $serviceRepository, 
        AvisRepository $avisRepository, 
        AnimalRepository $animalRepository,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $habitats = $habitatRepository->findAll();
        $services = $serviceRepository->findAll();
        $avis = $avisRepository->findBy(['isApproved' => true]);
        $animaux = $animalRepository->findAll();

        $newAvis = new Avis();
        $form = $this->createForm(AvisType::class, $newAvis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($newAvis);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'habitats' => $habitats,
            'services' => $services,
            'avis' => $avis,
            'animaux' => $animaux,
            'form' => $form->createView(),
        ]);
    }
}
