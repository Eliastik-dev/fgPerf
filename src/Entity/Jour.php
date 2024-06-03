<?php

namespace App\Entity;

use App\Repository\JourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JourRepository::class)
 */
class Jour
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Horaire::class, mappedBy="jour", cascade={"remove"}
)
     */
    private $horaires;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="jour", cascade={"remove"}
)
     */
    private $reservations;

    /**
     * @ORM\Column(type="date")
     */
    private $date;




    public function __construct()
    {
        $this->horaires = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->heures = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom . ' ' . date_format($this->date, 'd-m-Y');
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

    /**
     * @return Collection|Horaire[]
     */
    public function getHoraires(): Collection
    {
        return $this->horaires;
    }

    public function addHoraire(Horaire $horaire): self
    {
        if (!$this->horaires->contains($horaire)) {
            $this->horaires[] = $horaire;
            $horaire->setJour($this);
        }

        return $this;
    }

    public function removeHoraire(Horaire $horaire): self
    {
        if ($this->horaires->contains($horaire)) {
            $this->horaires->removeElement($horaire);
            // set the owning side to null (unless already changed)
            if ($horaire->getJour() === $this) {
                $horaire->setJour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setJour($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getJour() === $this) {
                $reservation->setJour(null);
            }
        }

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

    
}
