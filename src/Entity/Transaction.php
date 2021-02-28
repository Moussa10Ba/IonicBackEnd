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
 *     "get"={
 *     "method"="GET",
 *     "path"="/transactions",
 *     },
 *   "getBycode"={
 *     "method"="POST",
 *     "path"="/transactions/getbycode",
 *     "controller":"App\Controller\TransactionController::getInfos",
 *     "normalization_context"={"groups"={"getbycodeRead"}},
 *     "dormalization_context"={"groups"={"getbycodeWrite"}},
 *     },
 *     },
 *     itemOperations={
 *     "put",
 *    "get"={
 *     "method"="GET",
 *     "path"="/transactions",
 *     }
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
     * @Groups("getbycodeRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     * @Groups("getbycodeRead")
     * @Groups("getbycodeWrite")
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     * @Groups("getbycodeRead")
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
     * @ORM\Column(type="integer",nullable=true)
     * @Groups("transactionRead")
     */
    private $partAgenceRetrait;


    /**
     * @ORM\Column(type="integer",nullable=true)
     * @Groups("transactionRead")
     */
    private $partAgenceDepot;


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

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions", cascade={"persist"})
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $userDepot;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $userRetrait;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transactions")
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $compteDepot;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transactions")
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $compteRetrait;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="transactions",cascade={"persist"})
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $clientDepot;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="transactions",cascade={"persist"})
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $clientRetrait;

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

    public function getUserDepot(): ?User
    {
        return $this->userDepot;
    }

    public function setUserDepot(?User $userDepot): self
    {
        $this->userDepot = $userDepot;

        return $this;
    }

    public function getUserRetrait(): ?User
    {
        return $this->userRetrait;
    }

    public function setUserRetrait(?User $userRetrait): self
    {
        $this->userRetrait = $userRetrait;

        return $this;
    }

    public function getCompteDepot(): ?Compte
    {
        return $this->compteDepot;
    }

    public function setCompteDepot(?Compte $compteDepot): self
    {
        $this->compteDepot = $compteDepot;

        return $this;
    }

    public function getCompteRetrait(): ?Compte
    {
        return $this->compteRetrait;
    }

    public function setCompteRetrait(?Compte $compteRetrait): self
    {
        $this->compteRetrait = $compteRetrait;

        return $this;
    }

    public function getClientDepot(): ?Client
    {
        return $this->clientDepot;
    }

    public function setClientDepot(?Client $clientDepot): self
    {
        $this->clientDepot = $clientDepot;

        return $this;
    }

    public function getClientRetrait(): ?Client
    {
        return $this->clientRetrait;
    }

    public function setClientRetrait(?Client $clientRetrait): self
    {
        $this->clientRetrait = $clientRetrait;

        return $this;
    }
}
