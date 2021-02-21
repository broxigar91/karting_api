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

    public function getPilotBestLapInRace($pilot_id, $race_id)
    {
        return $this->createQueryBuilder('p')
        ->andWhere('p.pilot = :pilot')
        ->andWhere('p.race = :race')
        ->setParameter('pilot',$pilot_id)
        ->setParameter('race',$race_id)
        ->select('MIN(p.time) as best_lap')
        ->getQuery()
        ->getSingleScalarResult();
    }

    public function getPilotTotalTimeInRace($pilot_id,$race_id)
    {
        return $this->createQueryBuilder('p')
        ->andWhere('p.pilot = :pilot')
        ->andWhere('p.race = :race')
        ->setParameter('pilot',$pilot_id)
        ->setParameter('race',$race_id)
        ->select('SUM(TIME(p.time)) as total_time')
        ->getQuery()
        ->getSingleScalarResult();
    }

    public function getRaceClassification($race_id)
    {
        return $this->createQueryBuilder('q')
        ->andWhere('q.race = :race')
        ->innerJoin('q.pilot','p')
        ->orderBy('best_lap')
        ->groupBy('q.pilot')
        ->setParameter('race',$race_id)
        ->select('p.id as pilot,SUM(TIME(q.time)) as total_time, MIN(q.time) as best_lap')
        ->getQuery()
        ->getResult();
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
