<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $services = [
            ['name' => 'Restauration', 'description' => 'Découvrez nos points de restauration variés.', 'imageUrl' => 'images/restauration.jpg'],
            ['name' => 'Visite des habitats avec un guide', 'description' => 'Visite gratuite avec un guide pour découvrir les habitats.', 'imageUrl' => 'images/guide.jpg'],
            ['name' => 'Visite du zoo en petit train', 'description' => 'Profitez d\'une visite du zoo en petit train.', 'imageUrl' => 'images/train.jpg']
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
