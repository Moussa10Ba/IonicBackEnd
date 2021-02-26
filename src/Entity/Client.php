<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("transactionRead")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     * @Assert\Unique()
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("transactionRead")
     * @Groups("transactionWrite")
     * @Assert\Unique()
     */
    private $numCin;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="client")
     */
    private $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

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

    public function getNumCin(): ?string
    {
        return $this->numCin;
    }

    public function setNumCin(string $numCin): self
    {
        $this->numCin = $numCin;

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
            $transaction->setClient($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getClient() === $this) {
                $transaction->setClient(null);
            }
        }

        return $this;
    }
}
