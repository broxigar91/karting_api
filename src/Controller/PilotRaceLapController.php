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

}
