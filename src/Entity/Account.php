<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use App\Entity\Transaction;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Account;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 */
class Account
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=27)
     * @Assert\Iban
     */
    private $iban;

    /**
     * @ORM\Column(type="integer")
     */
    private $balance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="accounts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;


    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="creditAccount")
     */
    private $creditTransaction;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="debitAccount")
     */
    private $debitTransaction;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Person", mappedBy="beneficiaire")
     */
    private $people;

    /**
     * @ORM\Column(type="integer")
     */
    private $mountDebit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CarteBancaire", mappedBy="account")
     */
    private $carte;

    public function __construct()
    {
        $this->creditTransaction = new ArrayCollection();
        $this->debitTransaction = new ArrayCollection();
        $this->people = new ArrayCollection();
        $this->carte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getOwner(): ?Person
    {
        return $this->owner;
    }

    public function setOwner(?Person $owner): self
    {
        $this->owner = $owner;

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

    /**
     * @return Collection|Transaction[]
     */
    public function getCreditTransaction(): Collection
    {
        return $this->creditTransaction;
    }

    public function addCreditTransaction(Transaction $creditTransaction): self
    {
        if (!$this->creditTransaction->contains($creditTransaction)) {
            $this->creditTransaction[] = $creditTransaction;
            $creditTransaction->setCreditAccount($this);
        }

        return $this;
    }

    public function removeCreditTransaction(Transaction $creditTransaction): self
    {
        if ($this->creditTransaction->contains($creditTransaction)) {
            $this->creditTransaction->removeElement($creditTransaction);
            // set the owning side to null (unless already changed)
            if ($creditTransaction->getCreditAccount() === $this) {
                $creditTransaction->setCreditAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getDebitTransaction(): Collection
    {
        return $this->debitTransaction;
    }

    public function addDebitTransaction(Transaction $debitTransaction): self
    {
        if (!$this->debitTransaction->contains($debitTransaction)) {
            $this->debitTransaction[] = $debitTransaction;
            $debitTransaction->setDebitAccount($this);
        }

        return $this;
    }

    public function removeDebitTransaction(Transaction $debitTransaction): self
    {
        if ($this->debitTransaction->contains($debitTransaction)) {
            $this->debitTransaction->removeElement($debitTransaction);
            // set the owning side to null (unless already changed)
            if ($debitTransaction->getDebitAccount() === $this) {
                $debitTransaction->setDebitAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Person[]
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(Person $person): self
    {
        if (!$this->people->contains($person)) {
            $this->people[] = $person;
            $person->addBeneficiaire($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->people->contains($person)) {
            $this->people->removeElement($person);
            $person->removeBeneficiaire($this);
        }

        return $this;
    }

    public function getMountDebit(): ?int
    {
        return $this->mountDebit;
    }

    public function setMountDebit(int $mountDebit): self
    {
        $this->mountDebit = $mountDebit;

        return $this;
    }

    /**
     * @return Collection|CarteBancaire[]
     */
    public function getCarte(): Collection
    {
        return $this->carte;
    }

    public function addCarte(CarteBancaire $carte): self
    {
        if (!$this->carte->contains($carte)) {
            $this->carte[] = $carte;
            $carte->setAccount($this);
        }

        return $this;
    }

    public function removeCarte(CarteBancaire $carte): self
    {
        if ($this->carte->contains($carte)) {
            $this->carte->removeElement($carte);
            // set the owning side to null (unless already changed)
            if ($carte->getAccount() === $this) {
                $carte->setAccount(null);
            }
        }

        return $this;
    }    
}
