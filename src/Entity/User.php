<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numUser = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'numReser', targetEntity: Reservation::class)]
    private Collection $a;

    #[ORM\ManyToMany(targetEntity: Concert::class)]
    private Collection $consulte;

    /*
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?History $retracer = null;
    */

    /*
    #[ORM\OneToMany(mappedBy: 'no', targetEntity: Research::class)]
    private Collection $recherche;


    #[ORM\ManyToMany(targetEntity: Style::class)]
    private Collection $prefere;
*/
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $achete = null;

    #[ORM\ManyToMany(targetEntity: Like::class, mappedBy: 'aimePar')]
    private Collection $faitReference;

    public function __construct()
    {
        $this->a = new ArrayCollection();
        $this->consulte = new ArrayCollection();
        //$this->recherche = new ArrayCollection();
        //$this->prefere = new ArrayCollection();
        $this->faitReference = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumUser(): ?int
    {
        return $this->numUser;
    }

    public function setNumUser(int $numUser): self
    {
        $this->numUser = $numUser;

        return $this;
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getA(): Collection
    {
        return $this->a;
    }

    public function addA(Reservation $a): self
    {
        if (!$this->a->contains($a)) {
            $this->a->add($a);
            $a->setNumReser($this);
        }

        return $this;
    }

    public function removeA(Reservation $a): self
    {
        if ($this->a->removeElement($a)) {
            // set the owning side to null (unless already changed)
            if ($a->getNumReser() === $this) {
                $a->setNumReser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Concert>
     */
    public function getConsulte(): Collection
    {
        return $this->consulte;
    }

    public function addConsulte(Concert $consulte): self
    {
        if (!$this->consulte->contains($consulte)) {
            $this->consulte->add($consulte);
        }

        return $this;
    }

    public function removeConsulte(Concert $consulte): self
    {
        $this->consulte->removeElement($consulte);

        return $this;
    }

    /*
    public function getRetracer(): ?History
    {
        return $this->retracer;
    }

    public function setRetracer(History $retracer): self
    {
        $this->retracer = $retracer;

        return $this;
    }
    */

    /**
     * @return Collection<int, Research>
     */
    /*
    public function getRecherche(): Collection
    {
        return $this->recherche;
    }

    public function addRecherche(Research $recherche): self
    {
        if (!$this->recherche->contains($recherche)) {
            $this->recherche->add($recherche);
            $recherche->setNo($this);
        }

        return $this;
    }

    public function removeRecherche(Research $recherche): self
    {
        if ($this->recherche->removeElement($recherche)) {
            // set the owning side to null (unless already changed)
            if ($recherche->getNo() === $this) {
                $recherche->setNo(null);
            }
        }

        return $this;
    }
    */

    /**
     * @return Collection<int, Style>
     */
    /*
    public function getPrefere(): Collection
    {
        return $this->prefere;
    }

    public function addPrefere(Style $prefere): self
    {
        if (!$this->prefere->contains($prefere)) {
            $this->prefere->add($prefere);
        }

        return $this;
    }

    public function removePrefere(Style $prefere): self
    {
        $this->prefere->removeElement($prefere);

        return $this;
    }
    */

    public function getAchete(): ?Product
    {
        return $this->achete;
    }

    public function setAchete(?Product $achete): self
    {
        $this->achete = $achete;

        return $this;
    }

    /**
     * @return Collection<int, Like>
     */
    public function getFaitReference(): Collection
    {
        return $this->faitReference;
    }

    public function addFaitReference(Like $faitReference): self
    {
        if (!$this->faitReference->contains($faitReference)) {
            $this->faitReference->add($faitReference);
            $faitReference->addAimePar($this);
        }

        return $this;
    }

    public function removeFaitReference(Like $faitReference): self
    {
        if ($this->faitReference->removeElement($faitReference)) {
            $faitReference->removeAimePar($this);
        }

        return $this;
    }
}
