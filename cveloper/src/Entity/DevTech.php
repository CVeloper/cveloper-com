<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DevTechRepository")
 */
class DevTech
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\developer", inversedBy="devTeches")
     */
    private $id_developer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\technology", inversedBy="devTeches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_tech;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    public function __construct()
    {
        $this->id_developer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|developer[]
     */
    public function getIdDeveloper(): Collection
    {
        return $this->id_developer;
    }

    public function addIdDeveloper(developer $idDeveloper): self
    {
        if (!$this->id_developer->contains($idDeveloper)) {
            $this->id_developer[] = $idDeveloper;
        }

        return $this;
    }

    public function removeIdDeveloper(developer $idDeveloper): self
    {
        if ($this->id_developer->contains($idDeveloper)) {
            $this->id_developer->removeElement($idDeveloper);
        }

        return $this;
    }

    public function getIdTech(): ?technology
    {
        return $this->id_tech;
    }

    public function setIdTech(?technology $id_tech): self
    {
        $this->id_tech = $id_tech;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
