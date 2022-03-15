<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity
 */
class Conference
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
     * @var string|null
     *
     * @ORM\Column(name="THEME", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $theme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="INTERVENANT", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $intervenant;

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

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getIntervenant(): ?string
    {
        return $this->intervenant;
    }

    public function setIntervenant(?string $intervenant): self
    {
        $this->intervenant = $intervenant;

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
