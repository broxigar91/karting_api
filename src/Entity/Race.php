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

    public function __construct()
    {
        $this->raceLaps = new ArrayCollection();
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
}
