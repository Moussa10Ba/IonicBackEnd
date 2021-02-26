<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"transactionRead"}},
 *     denormalizationContext={"groups"={"transactionWrite"}},
 *  attributes={
 *     "security"="(is_granted('ROLE_UtilisateurAgence') or is_granted('ROLE_AdminAgence'))",
 *      "security_message"="Acces Denied",
 *     "paginationItemsPerPage"=100,
 *     },
 *     routePrefix="/user",
 *     collectionOperations={
 *     "post"={
 *        "method"="POST",
 *        "path"="/transactions",
 *     },
 *     "get",
 *     },
 *     itemOperations={
 *     "put"={
 *     "method"="PUT",
 *     "path"="/transactions/retrait",
 *     },
 *     "get"
 *     }
 * )
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("transactionRead")
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $montant;


    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     * @Groups("transactionRead")
     */
    private $partEtat;

    /**
     * @ORM\Column(type="integer")
     * @Groups("transactionRead")
     */
    private $partEnt;

    /**
     * @ORM\Column(type="integer")
     * @Groups("transactionRead")
     */
    private $partAgenceRetrait;


    /**
     * @ORM\Column(type="integer")
     * @Groups("transactionRead")
     */
    private $partAgenceDepot;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
     * @Groups("transactionRead")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transactions")
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $compte;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="transactions",cascade = {"persist"})
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $client;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("transactionRead")
     */
    private $isRetired;

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



    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPartEtat(): ?int
    {
        return $this->partEtat;
    }

    public function setPartEtat(int $partEtat): self
    {
        $this->partEtat = $partEtat;

        return $this;
    }

    public function getPartEnt(): ?int
    {
        return $this->partEnt;
    }

    public function setPartEnt(int $partEnt): self
    {
        $this->partEnt = $partEnt;

        return $this;
    }

    public function getPartAgenceRetrait(): ?int
    {
        return $this->partAgenceRetrait;
    }

    public function setPartAgenceRetrait(int $partAgenceRetrait): self
    {
        $this->partAgenceRetrait = $partAgenceRetrait;

        return $this;
    }


    public function getPartAgenceDepot(): ?int
    {
        return $this->partAgenceDepot;
    }

    public function setPartAgenceDepot(int $partAgenceDepot): self
    {
        $this->partAgenceDepot = $partAgenceDepot;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(?\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(?\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getIsRetired(): ?bool
    {
        return $this->isRetired;
    }

    public function setIsRetired(bool $isRetired): self
    {
        $this->isRetired = $isRetired;

        return $this;
    }
}
