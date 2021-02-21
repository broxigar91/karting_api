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

    public function __construct()
    {
        $this->raceLaps = new ArrayCollection();
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
}
