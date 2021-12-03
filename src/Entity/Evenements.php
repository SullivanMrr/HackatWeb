<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements", indexes={@ORM\Index(name="ID_HackaE", columns={"ID_HackaE"})})
 * @ORM\Entity
 */
class Evenements
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Evenemnts", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenemnts;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Libelle", type="string", length=50, nullable=true)
     */
    private $libelle;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateEven", type="date", nullable=true)
     */
    private $dateeven;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Heure", type="time", nullable=true)
     */
    private $heure;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Duree", type="time", nullable=true)
     */
    private $duree;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Salle", type="string", length=50, nullable=true)
     */
    private $salle;

    /**
     * @var \App\Entity\Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_HackaE", referencedColumnName="ID_Hackathon")
     * })
     */
    private $idHackae;

    public function getIdEvenemnts(): ?int
    {
        return $this->idEvenemnts;
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

    public function getDateeven(): ?\DateTimeInterface
    {
        return $this->dateeven;
    }

    public function setDateeven(?\DateTimeInterface $dateeven): self
    {
        $this->dateeven = $dateeven;

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

    public function getIdHackae(): ?Hackathon
    {
        return $this->idHackae;
    }

    public function setIdHackae(?Hackathon $idHackae): self
    {
        $this->idHackae = $idHackae;

        return $this;
    }


}
