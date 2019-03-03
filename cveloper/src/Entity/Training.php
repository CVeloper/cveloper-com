<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
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
    private $degree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $institution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_from;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_to;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Developer", inversedBy="trainings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_developer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(string $institution): self
    {
        $this->institution = $institution;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->date_from;
    }

    public function setDateFrom(\DateTimeInterface $date_from): self
    {
        $this->date_from = $date_from;

        return $this;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->date_to;
    }

    public function setDateTo(?\DateTimeInterface $date_to): self
    {
        $this->date_to = $date_to;

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
