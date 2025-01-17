<?php

namespace App\DataFixtures;

use App\Classes\Classification;
use App\Entity\Pilot;
use App\Entity\PilotRaceLap;
use App\Entity\PilotRaceResults;
use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ResultsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $pilotRaceLapRepository = $manager->getRepository(PilotRaceLap::class);
        $raceRepository = $manager->getRepository(Race::class);

        
        $races = $raceRepository->getAll();

        foreach($races as $r)
        {
            $classification = new Classification($pilotRaceLapRepository->getRaceClassification($r->getId()));

            $class_results= $classification->getResults();

            foreach($class_results as $result)
            {
                $pilotRaceResults = new PilotRaceResults();
                $pilotRaceResults->setPilot($manager->find(Pilot::class,$result->getPilot()));
                $pilotRaceResults->setRace($r);
                $pilotRaceResults->setPosition($result->getPosition());
                $pilotRaceResults->setTotalTime($result->getTotalTime());
                $pilotRaceResults->setBestLap($result->getBestLap());
                $pilotRaceResults->setPoints($result->getPoints());

                $manager->persist($pilotRaceResults);
            }
            
        }
        

        
        $manager->flush();
    }
}
