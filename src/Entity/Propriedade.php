<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropriedadeRepository")
 */
class Propriedade
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
    private $localizacao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produtor", inversedBy="propriedades")
     */
    private $produtor_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipo_producao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocalizacao(): ?string
    {
        return $this->localizacao;
    }

    public function setLocalizacao(?string $localizacao): self
    {
        $this->localizacao = $localizacao;

        return $this;
    }

    public function getProdutorId(): ?Produtor
    {
        return $this->produtor_id;
    }

    public function setProdutorId(?Produtor $produtor_id): self
    {
        $this->produtor_id = $produtor_id;

        return $this;
    }

    public function getTipoProducao(): ?string
    {
        return $this->tipo_producao;
    }

    public function setTipoProducao(?string $tipo_producao): self
    {
        $this->tipo_producao = $tipo_producao;

        return $this;
    }
}
