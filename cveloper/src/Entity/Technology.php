<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TechnologyRepository")
 */
class Technology
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DevTech", mappedBy="id_tech", orphanRemoval=true)
     */
    private $devTeches;

    public function __construct()
    {
        $this->devTeches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|DevTech[]
     */
    public function getDevTeches(): Collection
    {
        return $this->devTeches;
    }

    public function addDevTech(DevTech $devTech): self
    {
        if (!$this->devTeches->contains($devTech)) {
            $this->devTeches[] = $devTech;
            $devTech->setIdTech($this);
        }

        return $this;
    }

    public function removeDevTech(DevTech $devTech): self
    {
        if ($this->devTeches->contains($devTech)) {
            $this->devTeches->removeElement($devTech);
            // set the owning side to null (unless already changed)
            if ($devTech->getIdTech() === $this) {
                $devTech->setIdTech(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->id. ". " . $this->name;
    }
}
