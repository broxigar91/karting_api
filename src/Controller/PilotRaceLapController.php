<?php

namespace App\Controller;

use App\Repository\PilotRaceLapRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class PilotController
 * @package App\Controller
 * 
 * @Route(path="/api/")
*/
class PilotRaceLapController extends AbstractController
{

    private $pilotRaceLapRepository;

    public function __construct(PilotRaceLapRepository $pilotRaceLapRepository)
    {
        $this->pilotRaceLapRepository = $pilotRaceLapRepository;
    }

    /**
     * @Route("pilot/{id}", name="get_one_pilot", methods={"GET"})
     */
    public function get($id): JsonResponse
    {   
        // $p = $this->pilotRaceLapRepository->findOneBy(["pilot" => $id]);
        // $p = $this->pilotRaceLapRepository->getPilotBestLapInRace($id,1);
        $p = $this->pilotRaceLapRepository->getRaceClassification(1);
        
        var_dump($p);
        
        return $this->json([
            'best_lap' => $p
        ]);
    }
}
