<?php

namespace App\Controller;

use App\Entity\Avis;
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
            $avi->setIsApproved(true);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employee_manage_reviews');
    }

    #[Route('/{id}/invalidate', name: 'avis_invalidate', methods: ['POST'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function invalidate(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('invalidate' . $avi->getId(), $request->request->get('_token'))) {
            $avi->setIsApproved(false);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employee_manage_reviews');
    }

    #[Route('/{id}/delete', name: 'avis_delete', methods: ['POST'])]
    #[IsGranted('ROLE_EMPLOYEE')]
    public function delete(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $avi->getId(), $request->request->get('_token'))) {
            $entityManager->remove($avi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employee_manage_reviews');
    }
}
