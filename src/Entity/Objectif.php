<?php

namespace App\Entity;

use App\Repository\ObjectifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectifRepository::class)
 */
class Objectif
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
    private $remiseEnForme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $perteDePoids;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dvpt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $strength;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vitesse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $puissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $explosivite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aerobie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $effort;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRemiseEnForme(): ?string
    {
        return $this->remiseEnForme;
    }

    public function setRemiseEnForme(?string $remiseEnForme): self
    {
        $this->remiseEnForme = $remiseEnForme;

        return $this;
    }

    public function getPerteDePoids(): ?string
    {
        return $this->perteDePoids;
    }

    public function setPerteDePoids(?string $perteDePoids): self
    {
        $this->perteDePoids = $perteDePoids;

        return $this;
    }

    public function getDvpt(): ?string
    {
        return $this->dvpt;
    }

    public function setDvpt(?string $dvpt): self
    {
        $this->dvpt = $dvpt;

        return $this;
    }

    public function getStrength(): ?string
    {
        return $this->strength;
    }

    public function setStrength(?string $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getVitesse(): ?string
    {
        return $this->vitesse;
    }

    public function setVitesse(?string $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getPuissance(): ?string
    {
        return $this->puissance;
    }

    public function setPuissance(?string $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getExplosivite(): ?string
    {
        return $this->explosivite;
    }

    public function setExplosivite(?string $explosivite): self
    {
        $this->explosivite = $explosivite;

        return $this;
    }

    public function getAerobie(): ?string
    {
        return $this->aerobie;
    }

    public function setAerobie(?string $aerobie): self
    {
        $this->aerobie = $aerobie;

        return $this;
    }

    public function getEffort(): ?string
    {
        return $this->effort;
    }

    public function setEffort(?string $effort): self
    {
        $this->effort = $effort;

        return $this;
    }
}
