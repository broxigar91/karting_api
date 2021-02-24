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

    public function getRaceClassification($race_id)
    {
        return $this->createQueryBuilder('q')
        ->andWhere('q.race = :race')
        ->innerJoin('q.pilot','p')
        ->orderBy('total_time')
        ->groupBy('q.pilot')
        ->setParameter('race',$race_id)
        ->select('p.id as pilot,SEC_TO_TIME(SUM(TIME_TO_SEC(q.time))) as total_time, MIN(q.time) as best_lap')
        ->getQuery()
        ->getResult();
    }
}
