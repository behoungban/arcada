<?php

namespace App\Repository;

use App\Entity\OpeningHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OpeningHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpeningHours::class);
    }

    /**
     * @return OpeningHours[] Returns an array of OpeningHours objects
     */
    public function findAllOpeningHours(): array
    {
        return $this->createQueryBuilder('o')
            ->getQuery()
            ->getResult();
    }
}
