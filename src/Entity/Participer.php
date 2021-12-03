<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participer
 *
 * @ORM\Table(name="participer", indexes={@ORM\Index(name="ID_HackaP", columns={"ID_HackaP"}), @ORM\Index(name="ID_ParticiP", columns={"ID_ParticiP"})})
 * @ORM\Entity
 */
class Participer
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="NumInscri", type="integer", nullable=false)
     */
    private $numinscri;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateSaisie", type="date", nullable=false)
     */
    private $datesaisie;

    /**
     * @var \App\Entity\Participant
     *
     * @ORM\ManyToOne(targetEntity="Participant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ParticiP", referencedColumnName="ID_Participants")
     * })
     */
    private $idParticip;

    /**
     * @var \App\Entity\Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_HackaP", referencedColumnName="ID_Hackathon")
     * })
     */
    private $idHackap;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuminscri(): ?int
    {
        return $this->numinscri;
    }

    public function setNuminscri(int $numinscri): self
    {
        $this->numinscri = $numinscri;

        return $this;
    }

    public function getDatesaisie(): ?\DateTimeInterface
    {
        return $this->datesaisie;
    }

    public function setDatesaisie(\DateTimeInterface $datesaisie): self
    {
        $this->datesaisie = $datesaisie;

        return $this;
    }

    public function getIdParticip(): ?Participant
    {
        return $this->idParticip;
    }

    public function setIdParticip(?Participant $idParticip): self
    {
        $this->idParticip = $idParticip;

        return $this;
    }

    public function getIdHackap(): ?Hackathon
    {
        return $this->idHackap;
    }

    public function setIdHackap(?Hackathon $idHackap): self
    {
        $this->idHackap = $idHackap;

        return $this;
    }


}
