<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutorRepository")
 */
class Produtor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nome;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Propriedade", mappedBy="produtor_id", cascade={"persist"})
     */
    private $propriedades;

    public function __construct()
    {
        $this->propriedades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

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

    /**
     * @return Collection|Propriedade[]
     */
    public function getPropriedades(): Collection
    {
        return $this->propriedades;
    }

    public function addPropriedade(Propriedade $propriedade): self
    {
        if (!$this->propriedades->contains($propriedade)) {
            $this->propriedades[] = $propriedade;
            $propriedade->setProdutorId($this);
        }

        return $this;
    }

    public function removePropriedade(Propriedade $propriedade): self
    {
        if ($this->propriedades->contains($propriedade)) {
            $this->propriedades->removeElement($propriedade);
            // set the owning side to null (unless already changed)
            if ($propriedade->getProdutorId() === $this) {
                $propriedade->setProdutorId(null);
            }
        }

        return $this;
    }
}
