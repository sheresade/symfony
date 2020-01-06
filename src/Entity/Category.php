<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="category")
     */
    private $nameCategory;

    public function __construct()
    {
        $this->nameCategory = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getNameCategory(): Collection
    {
        return $this->nameCategory;
    }

    public function addNameCategory(Transaction $nameCategory): self
    {
        if (!$this->nameCategory->contains($nameCategory)) {
            $this->nameCategory[] = $nameCategory;
            $nameCategory->setCategory($this);
        }

        return $this;
    }

    public function removeNameCategory(Transaction $nameCategory): self
    {
        if ($this->nameCategory->contains($nameCategory)) {
            $this->nameCategory->removeElement($nameCategory);
            // set the owning side to null (unless already changed)
            if ($nameCategory->getCategory() === $this) {
                $nameCategory->setCategory(null);
            }
        }

        return $this;
    }
}
