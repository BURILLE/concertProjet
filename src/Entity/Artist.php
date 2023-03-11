<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $numArtist = null;

    #[ORM\ManyToMany(targetEntity: Tags::class)]
    private Collection $genre;

    //#[ORM\ManyToMany(targetEntity: Research::class)]
    //private Collection $seTrouve;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
        //$this->seTrouve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumArtist(): ?int
    {
        return $this->numArtist;
    }

    public function setNumArtist(int $numArtist): self
    {
        $this->numArtist = $numArtist;

        return $this;
    }

    /**
     * @return Collection<int, Tags>
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Tags $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre->add($genre);
        }

        return $this;
    }

    public function removeGenre(Tags $genre): self
    {
        $this->genre->removeElement($genre);

        return $this;
    }

        /**
         * @return Collection<int, Research>
         */
    /*    public function getSeTrouve(): Collection
       {
           return $this->seTrouve;
       }

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
}
