<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity(repositoryClass=App\Repository\ConferenceRepository::class)
 */
class Conference
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="Theme", type="string", length=50, nullable=true)
     */
    private $theme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Intervenant", type="string", length=50, nullable=true)
     */
    private $intervenant;

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
     * @var \App\Entity\Evenements
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Evenements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID", referencedColumnName="ID_Evenemnts")
     * })
     */
    private $id;

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

    public function getId(): ?Evenements
    {
        return $this->id;
    }

    public function setId(?Evenements $id): self
    {
        $this->id = $id;

        return $this;
    }


}
