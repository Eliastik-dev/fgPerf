<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HoraireRepository::class)
 */
class Horaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity=Jour::class, inversedBy="horaires", cascade={"remove"}
)
     * @ORM\JoinColumn(nullable=false)
     */
    private $jour;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="horaires", cascade={"remove"}
)
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="horaire", cascade={"remove"}
)
     */
    private $reservations;



    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }


    public function __toString()
    {
        return $this->heure;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getJour(): ?Jour
    {
        return $this->jour;
    }

    public function setJour(?Jour $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

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
            $reservation->setHoraire($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getHoraire() === $this) {
                $reservation->setHoraire(null);
            }
        }

        return $this;
    }

}
