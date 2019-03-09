<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $id_github;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Developer", mappedBy="id_user", cascade={"persist", "remove"})
     */
    private $developer;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): string // he modificado el tipo de array a string
    {
        // $roles = $this->roles; // he comentado esta linea
        // guarantee every user at least has ROLE_USER
        // $roles[] = 'ROLE_USER'; // he comentado esta linea
        if (count($this->roles) == 0 || $this->roles[0] != 'ROLE_USER') // compruebo
        $this->roles[] = 'ROLE_USER'; // meto el rol de usuario por defecto
        // return array_unique($roles); // he comentado esta linea
        return $this->roles[0]; // retorno solo el primer rol que tenga
    }

    public function setRoles(string $roles): self // he modificado $roles de array a string
    {
        // he modificado esta linea para que añada el rol al atributo roles
        $this->roles[0] = $roles;
        // lo meto en la primera posicion
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getIdGithub(): ?string
    {
        return $this->id_github;
    }

    public function setIdGithub(?string $id_github): self
    {
        $this->id_github = $id_github;

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
        return $this->id. ". " . $this->username;
    }
}
