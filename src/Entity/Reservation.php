<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $numUser = null;

    #[ORM\Column]
    private ?int $numReservation = null;

    #[ORM\ManyToOne(inversedBy: 'a')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $numReser = null;


    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hall $concerne = null;


    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Concert $faitReference = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumUser(): ?int
    {
        return $this->numUser;
    }

    public function setNumUser(int $numUser): self
    {
        $this->numUser = $numUser;

        return $this;
    }

    public function getNumReservation(): ?int
    {
        return $this->numReservation;
    }

    public function setNumReservation(int $numReservation): self
    {
        $this->numReservation = $numReservation;

        return $this;
    }

    public function getNumReser(): ?User
    {
        return $this->numReser;
    }

    public function setNumReser(?User $numReser): self
    {
        $this->numReser = $numReser;

        return $this;
    }


    public function getConcerne(): ?Hall
    {
        return $this->concerne;
    }

    public function setConcerne(Hall $concerne): self
    {
        $this->concerne = $concerne;

        return $this;
    }


    public function getFaitReference(): ?Concert
    {
        return $this->faitReference;
    }

    public function setFaitReference(Concert $faitReference): self
    {
        $this->faitReference = $faitReference;

        return $this;
    }
}
