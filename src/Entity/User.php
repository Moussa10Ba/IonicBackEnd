<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @ApiResource(
 * normalizationContext={"groups"={"userRead"}},
 * denormalizationContext={"groups"={"userWrite"}},
 * collectionOperations = {
 *  "addUtilisateur"={
 *    "method"="POST",
 *    "path"="/utilisateurs/add",
 *   "controller"="App\Controller\UserController::addUser",
 * },
 *  "get"
 * }
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("userRead")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups("userRead")
     * @Groups("userWrite")
     * @Groups("transactionRead")
     */
    private $email;


    protected $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("userRead")
     * @Groups("userWrite")
     * @Groups("transactionRead")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("userRead")
     * @Groups("userWrite")
     * @Groups("transactionRead")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("userRead")
     * @Groups("userWrite")
     * @Groups("transactionRead")
     */
    private $telephone;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups("userRead")
     * @Groups("userWrite")
     */
    private $avatar;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="users")
     * @Groups("userWrite")
     * @Groups("userRead")
     */
    private $profil;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("userWrite")
     * @Groups("userRead")
     */
    private $archiver;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="users")
     */
    private $agence;





    /**
     * @ORM\OneToMany(targetEntity=Depot::class, mappedBy="caissier")
     */
    private $depots;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="userDepot")
     */
    private $transactions;

    public function __construct()
    {
        $this->comptes = new ArrayCollection();
        $this->transactions = new ArrayCollection();
        $this->depots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_'.$this->profil->getLibelle();

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

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
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAvatar()
    {
        if($this->avatar)
        {
            $stream= stream_get_contents($this->avatar);
            return  base64_encode ($stream) ;
        }
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getArchiver(): ?bool
    {
        return $this->archiver;
    }

    public function setArchiver(bool $archiver): self
    {
        $this->archiver = $archiver;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }


    /**
     * @return Collection|Depot[]
     */
    public function getDepots(): Collection
    {
        return $this->depots;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depots->contains($depot)) {
            $this->depots[] = $depot;
            $depot->setCaissier($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->removeElement($depot)) {
            // set the owning side to null (unless already changed)
            if ($depot->getCaissier() === $this) {
                $depot->setCaissier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setUserDepot($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getUserDepot() === $this) {
                $transaction->setUserDepot(null);
            }
        }

        return $this;
    }
}
