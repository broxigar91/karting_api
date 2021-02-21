<?php

namespace App\Entity;

use App\Repository\PilotRaceResultsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PilotRaceResultsRepository::class)
 */
class PilotRaceResults
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pilot::class, inversedBy="pilotRaceResults")
     */
    private $pilot;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="pilotRaceResults")
     */
    private $race;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $total_time;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $best_lap;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPilot(): ?Pilot
    {
        return $this->pilot;
    }

    public function setPilot(?Pilot $pilot): self
    {
        $this->pilot = $pilot;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getTotalTime(): ?string
    {
        return $this->total_time;
    }

    public function setTotalTime(string $total_time): self
    {
        $this->total_time = $total_time;

        return $this;
    }

    public function getBestLap(): ?string
    {
        return $this->best_lap;
    }

    public function setBestLap(string $best_lap): self
    {
        $this->best_lap = $best_lap;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
