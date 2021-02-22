<?php

namespace App\Controller;

use App\Repository\PilotRaceResultsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class PilotRaceResultsController
 * @package App\Controller
 * 
 * @Route(path="/api/")
*/
class PilotRaceResultsController extends AbstractController
{

    private $repository;

    public function __construct(PilotRaceResultsRepository $pilotRaceResultRepository)
    {
        $this->repository = $pilotRaceResultRepository;
    }

    /**
     * @Route("pilot/{id}", name="get_pilot_results", methods={"GET"})
     */
    public function getPilotResults($id): JsonResponse
    {
        return $this->json($this->repository->getPilotResults($id));
    }

    /**
     * @Route("race/{id}", name="race_results", methods={"GET"})
     */
    public function getRaceResults($id): JsonResponse
    {
        return $this->json($this->repository->getRaceResults($id));
    }

    /**
     * @Route("classification", name="general_classification", methods={"GET"})
     */
    public function getGeneralClassification(): JsonResponse
    {
        return $this->json($this->repository->getGeneralClassification());
    }
}
