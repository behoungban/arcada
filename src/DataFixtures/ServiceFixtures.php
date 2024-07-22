<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $services = [
            [
                'name' => 'Restauration',
                'description' => 'Service de restauration avec plusieurs options de repas disponibles.',
                'imageUrl' => 'images/services/restauration.jpg'
            ],
            [
                'name' => 'Visite des habitats avec guide',
                'description' => 'Visite guidée gratuite des habitats avec des informations détaillées sur les animaux.',
                'imageUrl' => 'images/services/visite_habitats.jpg'
            ],
            [
                'name' => 'Visite du zoo en petit train',
                'description' => 'Tour du zoo en petit train pour une expérience amusante et relaxante.',
                'imageUrl' => 'images/services/petit_train.jpg'
            ]
        ];

        foreach ($services as $serviceData) {
            $service = new Service();
            $service->setName($serviceData['name']);
            $service->setDescription($serviceData['description']);
            $service->setImageUrl($serviceData['imageUrl']);
            $manager->persist($service);
        }

        $manager->flush();
    }
}
