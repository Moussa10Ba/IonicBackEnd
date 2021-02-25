<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
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
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $partEtat;

    /**
     * @ORM\Column(type="integer")
     */
    private $partEnt;

    /**
     * @ORM\Column(type="integer")
     */
    private $partAgenceRetrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $parAgenceRetrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $partAgenceDepot;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transactions")
     */
    private $compte;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getParAgenceRetrait(): ?int
    {
        return $this->parAgenceRetrait;
    }

    public function setParAgenceRetrait(int $parAgenceRetrait): self
    {
        $this->parAgenceRetrait = $parAgenceRetrait;

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
}
