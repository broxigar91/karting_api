<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=PilotRaceLap::class, mappedBy="race", orphanRemoval=true)
     */
    private $raceLaps;

    /**
     * @ORM\OneToMany(targetEntity=PilotRaceResults::class, mappedBy="race")
     */
    private $pilotRaceResults;

    public function __construct()
    {
        $this->raceLaps = new ArrayCollection();
        $this->pilotRaceResults = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

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
            $raceLap->setRace($this);
        }

        return $this;
    }

    public function removeRaceLap(PilotRaceLap $raceLap): self
    {
        if ($this->raceLaps->removeElement($raceLap)) {
            // set the owning side to null (unless already changed)
            if ($raceLap->getRace() === $this) {
                $raceLap->setRace(null);
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
            $pilotRaceResult->setRace($this);
        }

        return $this;
    }

    public function removePilotRaceResult(PilotRaceResults $pilotRaceResult): self
    {
        if ($this->pilotRaceResults->removeElement($pilotRaceResult)) {
            // set the owning side to null (unless already changed)
            if ($pilotRaceResult->getRace() === $this) {
                $pilotRaceResult->setRace(null);
            }
        }

        return $this;
    }
}
