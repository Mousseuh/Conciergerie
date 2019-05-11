<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Serializable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service implements \JsonSerializable
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
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formule", mappedBy="services")
     */
    private $formules;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="services")
     */
    private $users;

    public function __construct()
    {
        $this->formules = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Formule[]
     */
    public function getFormules(): Collection
    {
        return $this->formules;
    }

    public function addFormule(Formule $formule): self
    {
        if (!$this->packages->contains($formule)) {
            $this->formules[] = $formule;
            $formule->addService($this);
        }

        return $this;
    }

    public function removePackage(Formule $formule): self
    {
        if ($this->formules->contains($formule)) {
            $this->formules->removeElement($formule);
            $formule->removeService($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addService($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeService($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
