<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarteBancaireRepository")
 */
class CarteBancaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="date")
     */
    private $dateExpriration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="carte")
     */
    private $account;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="carteBlue")
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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDateExpriration(): ?\DateTimeInterface
    {
        return $this->dateExpriration;
    }

    public function setDateExpriration(\DateTimeInterface $dateExpriration): self
    {
        $this->dateExpriration = $dateExpriration;

        return $this;
    }

    public function getTitule(): ?string
    {
        return $this->titule;
    }

    public function setTitule(string $titule): self
    {
        $this->titule = $titule;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

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
            $transaction->setCarteBlue($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getCarteBlue() === $this) {
                $transaction->setCarteBlue(null);
            }
        }

        return $this;
    }
}
