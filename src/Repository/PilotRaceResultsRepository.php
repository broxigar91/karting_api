<?php

namespace App\Repository;

use App\Entity\PilotRaceResults;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PilotRaceResults|null find($id, $lockMode = null, $lockVersion = null)
 * @method PilotRaceResults|null findOneBy(array $criteria, array $orderBy = null)
 * @method PilotRaceResults[]    findAll()
 * @method PilotRaceResults[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PilotRaceResultsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PilotRaceResults::class);
    }

    // /**
    //  * @return PilotRaceResults[] Returns an array of PilotRaceResults objects
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
    public function findOneBySomeField($value): ?PilotRaceResults
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
