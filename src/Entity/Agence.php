<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   routePrefix="/adminsysteme",
 *   attributes={
 *      "pagination_items_per_page"=10,
 *      "security"="is_granted('ROLE_AdminSysteme')",
 *      "security_message"="Vous n'avez pas acces à cette ressource"
 * },
 * )
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 */
class Agence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("compteRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("compteRead")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("compteRead")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("compteRead")
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="agence")
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity=Compte::class, mappedBy="agence", cascade={"persist", "remove"})
     */
    private $compte;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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
            $user->setAgence($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAgence() === $this) {
                $user->setAgence(null);
            }
        }

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        // unset the owning side of the relation if necessary
        if ($compte === null && $this->compte !== null) {
            $this->compte->setAgence(null);
        }

        // set the owning side of the relation if necessary
        if ($compte !== null && $compte->getAgence() !== $this) {
            $compte->setAgence($this);
        }

        $this->compte = $compte;

        return $this;
    }
}
