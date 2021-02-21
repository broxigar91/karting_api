<?php

namespace App\DataFixtures;

use App\Entity\Pilot;
use App\Entity\PilotRaceLap;
use App\Entity\PilotRaceResults;
use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
               
        // $product = new Product();
        // $manager->persist($product);

        $fileData = file_get_contents("src/Resources/drivers_karts_BackJ.json");
        $karting = new ArrayCollection(json_decode($fileData));

        
        $races = new ArrayCollection($karting[0]->races);
        $races= $races->map(function($v){
            return $v->name;
        })->toArray();

        foreach($races as $i => $r)
        {
            $race = new Race();
            $race->setId($i+1);
            $race->setName($r);
            $manager->persist($race);
        }
        
        $manager->flush();
                      
        foreach($karting as $k)
        {
            $pilot = new Pilot();
            $pilot->setId($k->_id);
            $pilot->setPicture($k->picture);
            $pilot->setAge($k->age);
            $pilot->setName($k->name);
            $pilot->setTeam($k->team);

            $manager->persist($pilot);

            $races = new ArrayCollection($k->races);

            foreach($races as $i => $r)
            {
                foreach(new ArrayCollection($r->laps) as $lap)
                {
                    $pilotRaceLap = new PilotRaceLap();
                    $pilotRaceLap->setPilot($pilot);
                    $pilotRaceLap->setRace($manager->find(Race::class,$i+1));
                    $pilotRaceLap->setTime($lap->time);

                    $manager->persist($pilotRaceLap);
                }
            }
            
        }

        $manager->flush();
    }
}
