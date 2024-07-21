<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserSetupController extends AbstractController
{
    #[Route('/create-admin', name: 'create_admin')]
    public function createAdmin(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $user->setEmail('arcada@example.com');
        $user->setFirstname('Admin');
        $user->setLastname('User');
        $user->setRoles(['ROLE_ADMIN']);
        
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            'adminpassword'
        );
        $user->setPassword($hashedPassword);
        
        $entityManager->persist($user);
        $entityManager->flush();
        
        return new Response("L'administrateur a été créé.");
    }
}
