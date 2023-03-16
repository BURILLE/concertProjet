<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typeMusic = null;

    //#[ORM\ManyToMany(targetEntity: Research::class)]
    //private Collection $seTrouve;

    /*
    #[ORM\ManyToMany(targetEntity: Style::class)]
    private Collection $estDans;
    */

    #[ORM\OneToMany(mappedBy: 'faitReference', targetEntity: Like::class)]
    private Collection $aime;

    public function __construct()
    {
        $this->seTrouve = new ArrayCollection();
        //$this->estDans = new ArrayCollection();
        $this->aime = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeMusic(): ?string
    {
        return $this->typeMusic;
    }

    public function setTypeMusic(string $typeMusic): self
    {
        $this->typeMusic = $typeMusic;

        return $this;
    }

    /**
     * @return Collection<int, Research>
     */
    public function getSeTrouve(): Collection
    {
        return $this->seTrouve;
    }
/*
    public function addSeTrouve(Research $seTrouve): self
    {
        if (!$this->seTrouve->contains($seTrouve)) {
            $this->seTrouve->add($seTrouve);
        }

        return $this;
    }

    public function removeSeTrouve(Research $seTrouve): self
    {
        $this->seTrouve->removeElement($seTrouve);

        return $this;
    }
*/

    /**
     * @return Collection<int, Style>
     */
    /*
    public function getEstDans(): Collection
    {
        return $this->estDans;
    }

    public function addEstDan(Style $estDan): self
    {
        if (!$this->estDans->contains($estDan)) {
            $this->estDans->add($estDan);
        }

        return $this;
    }


    public function removeEstDan(Style $estDan): self
    {
        $this->estDans->removeElement($estDan);

        return $this;
    }
*/
    /**
     * @return Collection<int, Like>
     */
    public function getAime(): Collection
    {
        return $this->aime;
    }

    public function addAime(Like $aime): self
    {
        if (!$this->aime->contains($aime)) {
            $this->aime->add($aime);
            $aime->setFaitReference($this);
        }

        return $this;
    }

    public function removeAime(Like $aime): self
    {
        if ($this->aime->removeElement($aime)) {
            // set the owning side to null (unless already changed)
            if ($aime->getFaitReference() === $this) {
                $aime->setFaitReference(null);
            }
        }

        return $this;
    }
}
