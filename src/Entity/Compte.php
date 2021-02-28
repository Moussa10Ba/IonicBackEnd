<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *  denormalizationContext={"groups"={"compteWrite"}},
 *  normalizationContext={"groups"={"compteRead"}},
 * routePrefix="/adminsysteme",
 *  attributes={
 *      "pagination_items_per_page"=10,
 *      "security"="is_granted('ROLE_AdminSysteme')",
 *      "security_message"="Vous n'avez pas acces à cette ressource"
 * },
 *  itemOperations={
 *  "get","put","delete",
 * },
 * collectionOperations={
 *  "get","post",
 * },
 * )
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("compteRead")
     * @Groups("transactionRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("compteRead")
     * @Groups("compteWrite")
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     * @Groups("compteRead")
     * @Groups("compteWrite")
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("compteRead")
     * @Groups("compteWrite")
     */
    private $creatAt;

    /**
     * @ORM\OneToOne(targetEntity=Agence::class, inversedBy="compte", cascade={"persist", "remove"})
     * @Groups("compteRead")
     * @Groups("compteWrite")
     */
    private $agence;



    /**
     * @ORM\Column(type="boolean")
     */
    private $archiver = false;


    /**
     * @ORM\OneToMany(targetEntity=Depot::class, mappedBy="compte")
     */
    private $depots;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="compteDepot")
     */
    private $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
        $this->depots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCreatAt(): ?\DateTimeInterface
    {
        return $this->creatAt;
    }

    public function setCreatAt(\DateTimeInterface $creatAt): self
    {
        $this->creatAt = $creatAt;

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


    public function getArchiver(): ?bool
    {
        return $this->archiver;
    }

    public function setArchiver(bool $archiver): self
    {
        $this->archiver = $archiver;

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
            $depot->setCompte($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->removeElement($depot)) {
            // set the owning side to null (unless already changed)
            if ($depot->getCompte() === $this) {
                $depot->setCompte(null);
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
            $transaction->setCompteDepot($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getCompteDepot() === $this) {
                $transaction->setCompteDepot(null);
            }
        }

        return $this;
    }
}
