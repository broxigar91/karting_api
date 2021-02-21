<?php

namespace App\Entity;

use App\Repository\PilotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PilotRepository::class)
 */
class Pilot
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $team;

    /**
     * @ORM\OneToMany(targetEntity=PilotRaceLap::class, mappedBy="pilot", orphanRemoval=true)
     */
    private $raceLaps;

    /**
     * @ORM\OneToMany(targetEntity=PilotRaceResults::class, mappedBy="pilot")
     */
    private $pilotRaceResults;

    public function __construct()
    {
        $this->raceLaps = new ArrayCollection();
        $this->pilotRaceResults = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(?string $team): self
    {
        $this->team = $team;

        return $this;
    }

    /**
     * @return Collection|PilotRaceLap[]
     */
    public function getRaceLaps(): Collection
    {
        return $this->raceLaps;
    }

    public function addRaceLap(PilotRaceLap $raceLap): self
    {
        if (!$this->raceLaps->contains($raceLap)) {
            $this->raceLaps[] = $raceLap;
            $raceLap->setPilot($this);
        }

        return $this;
    }

    public function removeRaceLap(PilotRaceLap $raceLap): self
    {
        if ($this->raceLaps->removeElement($raceLap)) {
            // set the owning side to null (unless already changed)
            if ($raceLap->getPilot() === $this) {
                $raceLap->setPilot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PilotRaceResults[]
     */
    public function getPilotRaceResults(): Collection
    {
        return $this->pilotRaceResults;
    }

    public function addPilotRaceResult(PilotRaceResults $pilotRaceResult): self
    {
        if (!$this->pilotRaceResults->contains($pilotRaceResult)) {
            $this->pilotRaceResults[] = $pilotRaceResult;
            $pilotRaceResult->setPilot($this);
        }

        return $this;
    }

    public function removePilotRaceResult(PilotRaceResults $pilotRaceResult): self
    {
        if ($this->pilotRaceResults->removeElement($pilotRaceResult)) {
            // set the owning side to null (unless already changed)
            if ($pilotRaceResult->getPilot() === $this) {
                $pilotRaceResult->setPilot(null);
            }
        }

        return $this;
    }
}
