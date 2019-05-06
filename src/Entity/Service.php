<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="UserService", mappedBy="services")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="FormuleService", mappedBy="services")
     */
    private $formules;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->formules = new ArrayCollection();
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

    /**
     * @return Collection|UserService[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(UserService $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addService($this);
        }

        return $this;
    }

    public function removeUser(UserService $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeService($this);
        }

        return $this;
    }

    /**
     * @return Collection|FormuleService[]
     */
    public function getFormules(): Collection
    {
        return $this->formules;
    }

    public function addFormule(FormuleService $formule): self
    {
        if (!$this->formules->contains($formule)) {
            $this->formules[] = $formule;
            $formule->addService($this);
        }

        return $this;
    }

    public function removeFormule(FormuleService $formule): self
    {
        if ($this->formules->contains($formule)) {
            $this->formules->removeElement($formule);
            $formule->removeService($this);
        }

        return $this;
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
}
