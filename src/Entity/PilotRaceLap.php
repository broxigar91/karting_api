<?php

namespace App\Entity;

use App\Repository\PilotRaceLapRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PilotRaceLapRepository::class)
 */
class PilotRaceLap
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity=Pilot::class, inversedBy="raceLaps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pilot;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="raceLaps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
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
}
