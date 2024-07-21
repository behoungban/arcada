<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/home', name: 'admin_home')]
    public function index(): Response
    {
        return $this->render('admin/home.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/manage-users', name: 'admin_manage_users')]
    public function manageUsers(): Response
    {
        return $this->render('admin/manage_users.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}

// src/Controller/EmployeeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    #[Route('/employee/home', name: 'employee_home')]
    public function index(): Response
    {
        return $this->render('employee/home.html.twig', [
            'controller_name' => 'EmployeeController',
        ]);
    }

    #[Route('/employee/manage-reviews', name: 'employee_manage_reviews')]
    public function manageReviews(): Response
    {
        return $this->render('employee/manage_reviews.html.twig', [
            'controller_name' => 'EmployeeController',
        ]);
    }
}

// src/Controller/VetController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VetController extends AbstractController
{
    #[Route('/vet/home', name: 'vet_home')]
    public function index(): Response
    {
        return $this->render('vet/home.html.twig', [
            'controller_name' => 'VetController',
        ]);
    }

    #[Route('/vet/manage-appointments', name: 'vet_manage_appointments')]
    public function manageAppointments(): Response
    {
        return $this->render('vet/manage_appointments.html.twig', [
            'controller_name' => 'VetController',
        ]);
    }
}