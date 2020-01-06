<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="creditTransaction")
     * @ORM\JoinColumn(nullable=false)
     */
    private $creditAccount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="debitTransaction")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Expression(
     *     "this.getAmount()   <= value.getBalance()+value.getMountDebit()",
     *     message="This account cannot be debitted"
     * )
     */
    private $debitAccount;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="nameCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CarteBancaire", inversedBy="transactions")
     */
    private $carteBlue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreditAccount(): ?Account
    {
        return $this->creditAccount;
    }

    public function setCreditAccount(?Account $creditAccount): self
    {
        $this->creditAccount = $creditAccount;

        return $this;
    }

    public function getDebitAccount(): ?Account
    {
        return $this->debitAccount;
    }

    public function setDebitAccount(?Account $debitAccount): self
    {
        $this->debitAccount = $debitAccount;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCarteBlue(): ?CarteBancaire
    {
        return $this->carteBlue;
    }

    public function setCarteBlue(?CarteBancaire $carteBlue): self
    {
        $this->carteBlue = $carteBlue;

        return $this;
    }
}
