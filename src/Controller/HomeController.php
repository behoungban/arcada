<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HabitatRepository;
use App\Repository\ServiceRepository;
use App\Repository\AvisRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(HabitatRepository $habitatRepository, ServiceRepository $serviceRepository, AvisRepository $avisRepository): Response
    {
        $habitats = $habitatRepository->findAll();
        $services = $serviceRepository->findAll();
        $avis = $avisRepository->findBy(['isApproved' => true]);

        return $this->render('home/index.html.twig', [
            'habitats' => $habitats,
            'services' => $services,
            'avis' => $avis,
        ]);
    }
}
