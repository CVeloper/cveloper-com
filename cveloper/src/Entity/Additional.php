<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdditionalRepository")
 */
class Additional
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
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Developer", inversedBy="additionals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_developer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
}
