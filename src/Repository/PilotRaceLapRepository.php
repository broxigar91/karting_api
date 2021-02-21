<?php

namespace App\Repository;

use App\Entity\PilotRaceLap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PilotRaceLap|null find($id, $lockMode = null, $lockVersion = null)
 * @method PilotRaceLap|null findOneBy(array $criteria, array $orderBy = null)
 * @method PilotRaceLap[]    findAll()
 * @method PilotRaceLap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PilotRaceLapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PilotRaceLap::class);
    }

    // /**
    //  * @return PilotRaceLap[] Returns an array of PilotRaceLap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PilotRaceLap
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
