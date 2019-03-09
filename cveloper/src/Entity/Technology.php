<?php

namespace App\Entity;

// Use para poder utilizar VichUploader
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TechnologyRepository")
 * @Vich\Uploadable
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

    /**
     * @Vich\UploadableField(mapping="technology_logo", fileNameProperty="logo")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updated;

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

    public function setImageFile(File $image = null)
   {
       $this->imageFile = $image;

       // VERY IMPORTANT:
       // It is required that at least one field changes if you are using Doctrine,
       // otherwise the event listeners won't be called and the file is lost
       if ($image) {
           // if 'updatedAt' is not defined in your entity, use another property
           $this->updated = new \DateTime('now');
       }
   }

   public function getImageFile()
   {
       return $this->imageFile;
   }

   public function getUpdated(): ?\DateTimeInterface
   {
       return $this->updated;
   }

   public function setUpdated(?\DateTimeInterface $updated): self
   {
       $this->updated = $updated;

       return $this;
   }
}
