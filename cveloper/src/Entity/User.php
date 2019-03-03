<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pass;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auth;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Developer", mappedBy="id_user", cascade={"persist", "remove"})
     */
    private $developer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(?string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getAuth(): ?string
    {
        return $this->auth;
    }

    public function setAuth(?string $auth): self
    {
        $this->auth = $auth;

        return $this;
    }

    public function getDeveloper(): ?Developer
    {
        return $this->developer;
    }

    public function setDeveloper(Developer $developer): self
    {
        $this->developer = $developer;

        // set the owning side of the relation if necessary
        if ($this !== $developer->getIdUser()) {
            $developer->setIdUser($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->id . ". " . $this->user;
    }
}
