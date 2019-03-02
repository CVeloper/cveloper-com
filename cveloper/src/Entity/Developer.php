<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeveloperRepository")
 */
class Developer
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
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $web;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="developer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experience", mappedBy="id_developer", orphanRemoval=true)
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Training", mappedBy="id_developer", orphanRemoval=true)
     */
    private $trainings;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DevTech", mappedBy="id_developer")
     */
    private $devTeches;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Additional", mappedBy="id_developer", orphanRemoval=true)
     */
    private $additionals;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
        $this->trainings = new ArrayCollection();
        $this->devTeches = new ArrayCollection();
        $this->additionals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): self
    {
        $this->postal_code = $postal_code;

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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(?string $web): self
    {
        $this->web = $web;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setIdDeveloper($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            // set the owning side to null (unless already changed)
            if ($experience->getIdDeveloper() === $this) {
                $experience->setIdDeveloper(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Training[]
     */
    public function getTrainings(): Collection
    {
        return $this->trainings;
    }

    public function addTraining(Training $training): self
    {
        if (!$this->trainings->contains($training)) {
            $this->trainings[] = $training;
            $training->setIdDeveloper($this);
        }

        return $this;
    }

    public function removeTraining(Training $training): self
    {
        if ($this->trainings->contains($training)) {
            $this->trainings->removeElement($training);
            // set the owning side to null (unless already changed)
            if ($training->getIdDeveloper() === $this) {
                $training->setIdDeveloper(null);
            }
        }

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
            $devTech->addIdDeveloper($this);
        }

        return $this;
    }

    public function removeDevTech(DevTech $devTech): self
    {
        if ($this->devTeches->contains($devTech)) {
            $this->devTeches->removeElement($devTech);
            $devTech->removeIdDeveloper($this);
        }

        return $this;
    }

    /**
     * @return Collection|Additional[]
     */
    public function getAdditionals(): Collection
    {
        return $this->additionals;
    }

    public function addAdditional(Additional $additional): self
    {
        if (!$this->additionals->contains($additional)) {
            $this->additionals[] = $additional;
            $additional->setIdDeveloper($this);
        }

        return $this;
    }

    public function removeAdditional(Additional $additional): self
    {
        if ($this->additionals->contains($additional)) {
            $this->additionals->removeElement($additional);
            // set the owning side to null (unless already changed)
            if ($additional->getIdDeveloper() === $this) {
                $additional->setIdDeveloper(null);
            }
        }

        return $this;
    }
}
