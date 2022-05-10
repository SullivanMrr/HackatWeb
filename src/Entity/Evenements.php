<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements", indexes={@ORM\Index(name="I_FK_EVENEMENTS_HACKATHON", columns={"ID_HACKATHON"})})
 * @ORM\Entity
 */
class Evenements
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_EVENEMENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenement;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_HACKATHON", type="integer", nullable=false)
     */
    private $idHackathon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIBELLE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $libelle;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HEURE", type="time", nullable=true)
     */
    private $heure;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DUREE", type="time", nullable=true)
     */
    private $duree;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SALLE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $salle;

    public function getIdEvenement(): ?int
    {
        return $this->idEvenement;
    }

    public function getIdHackathon(): ?int
    {
        return $this->idHackathon;
    }

    public function setIdHackathon(int $idHackathon): self
    {
        $this->idHackathon = $idHackathon;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(?string $salle): self
    {
        $this->salle = $salle;

        return $this;
    }


}
