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
    
    public function getPilotResults($id)
    {
        return $this->createQueryBuilder('q')
            ->innerjoin('q.race', 'r')
            ->andWhere('q.pilot = :pilot')
            ->setParameter('pilot', $id)
            ->orderBy('q.race', 'ASC')
            ->select('r.name as race,q.total_time, q.best_lap, q.points')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return PilotRaceResults[] Returns an array of PilotRaceResults objects
    //  */
    
    public function getRaceResults($id)
    {
        return $this->createQueryBuilder('q')
            ->innerjoin('q.pilot', 'p')
            ->andWhere('q.race = :race')
            ->setParameter('race', $id)
            ->orderBy('q.points', 'DESC')
            ->select('p.name as pilot,q.total_time, q.best_lap, q.points')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return PilotRaceResults[] Returns an array of PilotRaceResults objects
    //  */
    
    public function getGeneralClassification()
    {
        return $this->createQueryBuilder('q')
            ->innerjoin('q.pilot', 'p')
            ->orderBy('points', 'DESC')
            ->groupBy('q.pilot')
            ->select('p.name as pilot,SEC_TO_TIME(SUM(TIME_TO_SEC(q.total_time))) as total_time, SUM(q.points) as points')
            ->getQuery()
            ->getResult()
        ;
    }
    

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
