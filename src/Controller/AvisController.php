<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/avis')]
class AvisController extends AbstractController
{
    #[Route('/{id}/validate', name: 'avis_validate', methods: ['POST'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function validate(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('validate' . $avi->getId(), $request->request->get('_token'))) {
            $avi->setValidated(true);
            $entityManager->flush();
        }

        return $this->redirectToRoute('avis_index');
    }
}