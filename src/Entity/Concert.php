<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcertRepository::class)]
class Concert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $nbPlaces = null;

    #[ORM\Column]
    private ?int $numConcert = null;

    #[ORM\ManyToMany(targetEntity: Artist::class)]
    private Collection $joue;

    /*
    #[ORM\Column(length: 255)]
    private ?string $no = null;
*/
    /*
    #[ORM\ManyToMany(targetEntity: History::class)]
    private Collection $construire;
    */

    public function __construct()
    {
        $this->joue = new ArrayCollection();
        //$this->construire = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getNumConcert(): ?int
    {
        return $this->numConcert;
    }

    public function setNumConcert(int $numConcert): self
    {
        $this->numConcert = $numConcert;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getJoue(): Collection
    {
        return $this->joue;
    }

    public function addJoue(Artist $joue): self
    {
        if (!$this->joue->contains($joue)) {
            $this->joue->add($joue);
        }

        return $this;
    }

    public function removeJoue(Artist $joue): self
    {
        $this->joue->removeElement($joue);

        return $this;
    }

    /*
    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(string $no): self
    {
        $this->no = $no;

        return $this;
    }
    */

    /**
     * @return Collection<int, History>
     */

    /*
    public function getConstruire(): Collection
    {
        return $this->construire;
    }

    public function addConstruire(History $construire): self
    {
        if (!$this->construire->contains($construire)) {
            $this->construire->add($construire);
        }

        return $this;
    }

    public function removeConstruire(History $construire): self
    {
        $this->construire->removeElement($construire);

        return $this;
    }
    */
}
