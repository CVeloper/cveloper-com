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
     * @ORM\ManyToOne(targetEntity="App\Entity\Technology", inversedBy="devTeches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_tech;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Developer", inversedBy="devTeches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_developer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTech(): ?Technology
    {
        return $this->id_tech;
    }

    public function setIdTech(?Technology $id_tech): self
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

    public function getIdDeveloper(): ?Developer
    {
        return $this->id_developer;
    }

    public function setIdDeveloper(?Developer $id_developer): self
    {
        $this->id_developer = $id_developer;

        return $this;
    }

    public function __toString()
    {
        return $this->id. ". D#" . $this->id_developer . " T#" . $this->id_tech . " L#" . $this->level;
    }
}
