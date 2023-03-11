<?php

namespace App\Entity;

use App\Repository\LikeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikeRepository::class)]
#[ORM\Table(name: '`like`')]
class Like
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numTag = null;

    #[ORM\Column]
    private ?int $numUser = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'faitReference')]
    private Collection $aimePar;

    #[ORM\ManyToOne(inversedBy: 'aime')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tags $faitReference = null;

    public function __construct()
    {
        $this->aimePar = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumTag(): ?int
    {
        return $this->numTag;
    }

    public function setNumTag(int $numTag): self
    {
        $this->numTag = $numTag;

        return $this;
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

    /**
     * @return Collection<int, User>
     */
    public function getAimePar(): Collection
    {
        return $this->aimePar;
    }

    public function addAimePar(User $aimePar): self
    {
        if (!$this->aimePar->contains($aimePar)) {
            $this->aimePar->add($aimePar);
        }

        return $this;
    }

    public function removeAimePar(User $aimePar): self
    {
        $this->aimePar->removeElement($aimePar);

        return $this;
    }

    public function getFaitReference(): ?Tags
    {
        return $this->faitReference;
    }

    public function setFaitReference(?Tags $faitReference): self
    {
        $this->faitReference = $faitReference;

        return $this;
    }
}
